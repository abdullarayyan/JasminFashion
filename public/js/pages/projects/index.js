$(document).ready(() => {
    let pageSize = 10;
    let numberOfItems;
    let limitPerPage = 2;
    let totalPages;
    let currentPage = 1;
    let columnSearchName;
    let columnSearchValue;

    let filter = {
        columns: {
            title: '',
            beneficiaries_count: ''
        },
        sort: 'title',
        direction: 'asc'
    };

    let projectToDelete;

    searchColumn = (value, id) => {
        columnSearchName = id;
        columnSearchValue = value;

        filter.columns[columnSearchName] = columnSearchValue;
        getProjects(0);
    }

    changeSort = (columnName) => {
        if (filter.sort === columnName) {
            filter.direction = filter.direction === 'asc' ? 'desc' : 'asc';
        } else {
            filter.sort = columnName;
            filter.direction = 'asc';
        }
        if (filter.direction === 'desc') {

            for (let key in filter.columns) {
                if (filter.columns.hasOwnProperty(key)) {
                    if ($(`.${key}_head i`).hasClass('bxs-down-arrow')) {
                        $(`.${key}_head i`).removeClass('bxs-down-arrow');
                        $(`.${key}_head i`).addClass('bxs-up-arrow');
                    }
                }
            }

            $(`.${columnName}_head i`).removeClass('bxs-up-arrow');
            $(`.${columnName}_head i`).addClass('bxs-down-arrow');
        }
        else if (filter.direction === 'asc') {
            for (let key in filter.columns) {
                if (filter.columns.hasOwnProperty(key)) {
                    if ($(`.${key}_head i`).hasClass('bxs-up-arrow')) {
                        $(`.${key}_head i`).removeClass('bxs-up-arrow');
                        $(`.${key}_head i`).addClass('bxs-down-arrow');
                    }
                }
            }

            $(`.${columnName}_head i`).removeClass('bxs-down-arrow');
            $(`.${columnName}_head i`).addClass('bxs-up-arrow');
        }
        getProjects(0);
    }

    renderPaginationDetails = (dataObject) => {
        let from = dataObject.from || 0;
        let to = dataObject.to || 0;
        let total = dataObject.total;
        let message = `إظهار ${from} إلى ${to} من أصل ${total}`;
        document.getElementById("pagination_details").innerText = message;
    }

    renderProjects = (response) => {
        renderPaginationDetails(response);
        numberOfItems = response.total;
        totalPages = response.last_page;
        currentPage = response.current_page;

        document.getElementById('last-page-link').innerText = totalPages;
        $("#previous-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage === totalPages);

        if (response && response.data.length > 0) {
            $("#projectsTable tbody tr").remove();

            const projects = response.data;
            let table = document.getElementById('projectsTable');
            let tbody = table.tBodies[0];

            projects.forEach(project => {
                let new_row = document.createElement('tr');

                let td0 = document.createElement('td');
                td0.setAttribute('class', 'project_name');
                let link = document.createElement('a');
                link.setAttribute('href', `/show-project/${project.id}`);
                let linkText = document.createTextNode(project.title);
                link.appendChild(linkText);
                td0.appendChild(link);
                new_row.appendChild(td0);

                let td1 = document.createElement('td');
                td1.appendChild(document.createTextNode(project.beneficiaries_count || 0));
                new_row.appendChild(td1);


                let td2 = document.createElement('td');
                td2.setAttribute('class', 'actions');
                let icon = document.createElement('i');
                icon.setAttribute('data-toggle', 'modal');
                icon.setAttribute('data-target', '#confirmDeletModal');
                icon.setAttribute('class', 'bx bx-trash');
                icon.setAttribute('data-id', project.id);
                td2.appendChild(icon);

                let icon2 = document.createElement('i');
                icon2.setAttribute('class', 'bx bx-duplicate mx-2');
                icon2.setAttribute('data-id', project.id);
                td2.appendChild(icon2);
                new_row.appendChild(td2);

                tbody.appendChild(new_row);
            });
        } else {
            $("#projectsTable tbody tr").remove();

            let table = document.getElementById('projectsTable');
            let tbody = table.tBodies[0];
            let new_row = document.createElement('tr');

            let td1 = document.createElement('td');
            td1.setAttribute('colSpan', "6");

            let alert = document.createElement('div');
            alert.setAttribute('class', 'alert alert-info');
            alert.setAttribute('role', 'alert');
            alert.appendChild(document.createTextNode('لا يوجد مشاريع'));

            td1.appendChild(alert);
            new_row.appendChild(td1);

            tbody.appendChild(new_row);
        }
    }

    getProjects = (allPages = currentPage) => {
        $.ajax({
            type: 'GET',
            url: `/projects/projects-list/${pageSize}?page=${allPages}&filter=${JSON.stringify(filter)}`,
            success: (response) => {
                renderProjects(response);
                bindDuplicateEvent();
            },
            error: (error) => {
                console.error(error);
            }
        });
    }

    bindDuplicateEvent = () => {
        let icons = document.querySelectorAll('.bx-duplicate');
        icons.forEach(icon => {
            icon.addEventListener('click', function(e) {
                let projectId = e.target.dataset.id;

                $.ajax({
                    type: 'post',
                    url: `/api/duplicate-project/${projectId}`,
                    success: (res) => {
                        getProjects();
                    },
                    error: (error) => {
                        console.error(error);
                    }
                });
            })
        })
    }

    $("#next-page").on("click", function () {
        currentPage = (currentPage + 1);
        document.getElementById('custom-page').value = currentPage;
        getProjects();
    });

    $("#previous-page").on("click", function () {
        currentPage = (currentPage - 1);
        document.getElementById('custom-page').value = currentPage;
        getProjects();
    });

    $("#first-page").on("click", function () {
        currentPage = 1;
        document.getElementById('custom-page').value = currentPage;
        getProjects();
    });

    $("#last-page").on("click", function () {
        currentPage = totalPages;
        document.getElementById('custom-page').value = currentPage;
        getProjects();
    });

    changePage = () => {
        let newPage = document.getElementById('custom-page').value;
        if (newPage != currentPage) {
            currentPage = newPage;
            getProjects();
        }
    }

    changePageSize = () => {
        pageSize = $("#pageSize").val();
        getProjects();
    }

    getProjects();


    initProjectToDelete = (project_id) => {
        projectToDelete = project_id;
    }

    $('#confirmDeletModal').on('show.bs.modal', function(e) {
        var projectId = $(e.relatedTarget).data('id');
        initProjectToDelete(projectId);
    });

    deleteProject = () => {
        showLoading();
        $.ajax({
            type: "POST",
            url: "/deleteProject",
            data: {
                'project_id': projectToDelete
            },
            success: (response) => {
                hideLoading();
            },
            error: (error) => {
                console.error(error);
                hideLoading();
            }
        });
    }

});
