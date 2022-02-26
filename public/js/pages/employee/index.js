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
            nationality: '',
            martial_status: '',
            mobile_1: '',
            idc: '',
            address: '',
            job_id: '',
            role: ''
        },
        sort: 'full_name',
        direction: 'asc'
    };

    searchColumn = (value, id) => {
        columnSearchName = id;
        columnSearchValue = value;

        filter.columns[columnSearchName] = columnSearchValue;
        getEmployees(0);
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
        getEmployees(0);
    }

    renderPaginationDetails = (dataObject) => {
        let from = dataObject.from || 0;
        let to = dataObject.to || 0;
        let total = dataObject.total;
        let message = `إظهار ${from} إلى ${to} من أصل ${total}`;
        document.getElementById("pagination_details").innerText = message;
    }

    renderEmployees = (response) => {
        renderPaginationDetails(response);
        numberOfItems = response.total;
        totalPages = response.last_page;
        currentPage = response.current_page;

        document.getElementById('last-page-link').innerText = totalPages;
        $("#previous-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage === totalPages);

        if (response && response.data.length > 0) {
            $("#employeesTable tbody tr").remove();

            const employees = response.data;
            let table = document.getElementById('employeesTable');
            let tbody = table.tBodies[0];

            employees.forEach(employee => {
                let new_row = document.createElement('tr');

                let td0 = document.createElement('td');
                td0.setAttribute('class', 'employee_name');
                let link = document.createElement('a');
                link.setAttribute('href', `/update-employee/${employee.id}`);
                let linkText = document.createTextNode(employee.full_name);
                link.appendChild(linkText);
                td0.appendChild(link);
                new_row.appendChild(td0);

                let td9 = document.createElement('td');
                td9.appendChild(document.createTextNode(employee.username));
                new_row.appendChild(td9);

                let td1 = document.createElement('td');
                td1.appendChild(document.createTextNode(employee.nationality));
                new_row.appendChild(td1);

                let td2 = document.createElement('td');
                td2.appendChild(document.createTextNode(employee.martial_status));
                new_row.appendChild(td2);

                let td3 = document.createElement('td');
                td3.appendChild(document.createTextNode(employee.mobile_1));
                new_row.appendChild(td3);

                let td4 = document.createElement('td');
                td4.appendChild(document.createTextNode(employee.idc));
                new_row.appendChild(td4);

                let td5 = document.createElement('td');
                td5.appendChild(document.createTextNode(employee.address));
                new_row.appendChild(td5);

                let td6 = document.createElement('td');
                td6.appendChild(document.createTextNode(employee.job_id));
                new_row.appendChild(td6);

                let td7 = document.createElement('td');
                td7.appendChild(document.createTextNode(employee.role));
                new_row.appendChild(td7);

                let td8 = document.createElement('td');
                td8.setAttribute('class', 'actions');
                let icon = document.createElement('i');
                icon.setAttribute('data-toggle', 'modal');
                icon.setAttribute('data-target', '#confirmDeletModal');
                icon.setAttribute('class', 'bx bx-trash');
                icon.setAttribute('data-id', employee.id);
                td8.appendChild(icon);
                new_row.appendChild(td8);

                tbody.appendChild(new_row);
            });
        } else {
            $("#employeesTable tbody tr").remove();

            let table = document.getElementById('employeesTable');
            let tbody = table.tBodies[0];
            let new_row = document.createElement('tr');

            let td1 = document.createElement('td');
            td1.setAttribute('colSpan', "9");

            let alert = document.createElement('div');
            alert.setAttribute('class', 'alert alert-info');
            alert.setAttribute('role', 'alert');
            alert.appendChild(document.createTextNode('لا يوجد موظفين'));

            td1.appendChild(alert);
            new_row.appendChild(td1);

            tbody.appendChild(new_row);
        }
    }

    getEmployees = (allPages = currentPage) => {
        document.getElementById('hidden_filter').value = JSON.stringify(filter);

        $.ajax({
            type: 'GET',
            url: `/employees/employees-list/${pageSize}?page=${allPages}&filter=${JSON.stringify(filter)}`,
            success: (response) => {
                renderEmployees(response);
            },
            error: (error) => {
                console.error(error);
            }
        });
    }

    $("#next-page").on("click", function () {
        currentPage = (currentPage + 1);
        document.getElementById('custom-page').value = currentPage;
        getEmployees();
    });

    $("#previous-page").on("click", function () {
        currentPage = (currentPage - 1);
        document.getElementById('custom-page').value = currentPage;
        getEmployees();
    });

    $("#first-page").on("click", function () {
        currentPage = 1;
        document.getElementById('custom-page').value = currentPage;
        getEmployees();
    });

    $("#last-page").on("click", function () {
        currentPage = totalPages;
        document.getElementById('custom-page').value = currentPage;
        getEmployees();
    });

    changePage = () => {
        let newPage = document.getElementById('custom-page').value;
        if (newPage != currentPage) {
            currentPage = newPage;
            getEmployees();
        }
    }

    changePageSize = () => {
        pageSize = $("#pageSize").val();
        getEmployees();
    }

    getEmployees();

    $('#confirmDeletModal').on('show.bs.modal', function (e) {
        var employeeId = $(e.relatedTarget).data('id');
        setEmployeeToDelete(employeeId);
    });

    $("#deleteEmployeeButton").click((e) => {
        e.stopPropagation();
        e.preventDefault();

        deleteEmployee();
    });
});


let employeeToDelete;

setEmployeeToDelete = (employee_id) => {
    employeeToDelete = employee_id;
}

deleteEmployee = () => {
    showLoading();
    $.ajax({
        type: "POST",
        url: "/deleteEmployee",
        data: {
            'employee_id': employeeToDelete
        },
        success: (response) => {
            $('#confirmDeletModal').modal('hide');
            getEmployees();
            hideLoading();
        },
        error: (error) => {
            console.error(error);
            hideLoading();
        }
    });
}
