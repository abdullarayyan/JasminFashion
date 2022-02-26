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
            full_name: '',
            idc: '',
            nationality: '',
            yatem_full_name: '',
            yatem_idc: ''
        },
        sort: 'full_name',
        direction: 'asc'
    };

    searchColumn = (value, id) => {
        columnSearchName = id;
        columnSearchValue = value;

        filter.columns[columnSearchName] = columnSearchValue;
        getMothers(0);
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
        getMothers(0);
    }

    renderPaginationDetails = (dataObject) => {
        let from = dataObject.from || 0;
        let to = dataObject.to || 0;
        let total = dataObject.total;
        let message = `إظهار ${from} إلى ${to} من أصل ${total}`;
        document.getElementById("pagination_details").innerText = message;
    }

    renderMothers = (response) => {
        renderPaginationDetails(response);
        numberOfItems = response.total;
        totalPages = response.last_page;
        currentPage = response.current_page;

        document.getElementById('last-page-link').innerText = totalPages;
        $("#previous-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage === totalPages);

        if (response && response.data.length > 0) {
            $("#mothersTable tbody tr").remove();

            const mothers = response.data;
            let table = document.getElementById('mothersTable');
            let tbody = table.tBodies[0];

            mothers.forEach(mother => {
                let new_row = document.createElement('tr');

                let td0 = document.createElement('td');
                td0.appendChild(document.createTextNode(mother.full_name));
                new_row.appendChild(td0);

                let td1 = document.createElement('td');
                td1.appendChild(document.createTextNode(mother.idc));
                new_row.appendChild(td1);

                let td2 = document.createElement('td');
                td2.appendChild(document.createTextNode(mother.nationality));
                new_row.appendChild(td2);

                let td3 = document.createElement('td');
                td3.setAttribute('class', 'yatem_name');
                let link = document.createElement('a');
                link.setAttribute('href', `/edit-yatem-form/${mother.yatem_id}`);
                let linkText = document.createTextNode(mother.yatem_name);
                link.appendChild(linkText);
                td3.appendChild(link);
                new_row.appendChild(td3);

                let td4 = document.createElement('td');
                td4.appendChild(document.createTextNode(mother.yatem_idc));
                new_row.appendChild(td4);

                tbody.appendChild(new_row);
            });
        } else {
            $("#mothersTable tbody tr").remove();

            let table = document.getElementById('mothersTable');
            let tbody = table.tBodies[0];
            let new_row = document.createElement('tr');

            let td1 = document.createElement('td');
            td1.setAttribute('colSpan', "5");

            let alert = document.createElement('div');
            alert.setAttribute('class', 'alert alert-info');
            alert.setAttribute('role', 'alert');
            alert.appendChild(document.createTextNode('لا يوجد أمهات'));

            td1.appendChild(alert);
            new_row.appendChild(td1);

            tbody.appendChild(new_row);
        }
    }

    getMothers = (allPages = currentPage) => {
        document.getElementById('hidden_filter').value = JSON.stringify(filter);

        $.ajax({
            type: 'GET',
            url: `/mothers/mothers-list/${pageSize}?page=${allPages}&filter=${JSON.stringify(filter)}`,
            success: (response) => {
                renderMothers(response);
            },
            error: (error) => {
                console.error(error);
            }
        });
    }

    $("#next-page").on("click", function () {
        currentPage = (currentPage + 1);
        document.getElementById('custom-page').value = currentPage;
        getMothers();
    });

    $("#previous-page").on("click", function () {
        currentPage = (currentPage - 1);
        document.getElementById('custom-page').value = currentPage;
        getMothers();
    });

    $("#first-page").on("click", function () {
        currentPage = 1;
        document.getElementById('custom-page').value = currentPage;
        getMothers();
    });

    $("#last-page").on("click", function () {
        currentPage = totalPages;
        document.getElementById('custom-page').value = currentPage;
        getMothers();
    });

    changePage = () => {
        let newPage = document.getElementById('custom-page').value;
        if (newPage != currentPage) {
            currentPage = newPage;
            getMothers();
        }
    }

    changePageSize = () => {
        pageSize = $("#pageSize").val();
        getMothers();
    }

    getMothers();
});