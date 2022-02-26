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
            yatem_name: '',
            sponsor_name: '',
            amount: '',
            payments: '',
            spending: '',
            status: '',
            start: '',
            end: '',
        },
        sort: 'created_at',
        direction: 'desc'
    };

    searchColumn = (value, id) => {
        columnSearchName = id;
        columnSearchValue = value;

        filter.columns[columnSearchName] = columnSearchValue;
        getWarranties(0);
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
        getWarranties(0);
    }

    renderPaginationDetails = (dataObject) => {
        let from = dataObject.from || 0;
        let to = dataObject.to || 0;
        let total = dataObject.total;
        let message = `إظهار ${from} إلى ${to} من أصل ${total}`;
        document.getElementById("pagination_details").innerText = message;
    }

    renderWarranties = (response) => {
        renderPaginationDetails(response);
        numberOfItems = response.total;
        totalPages = response.last_page;
        currentPage = response.current_page;

        document.getElementById('last-page-link').innerText = totalPages;
        $("#previous-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage === totalPages);

        if (response && response.data.length > 0) {
            $("#warrantiesTable tbody tr").remove();

            const warranties = response.data;
            let table = document.getElementById('warrantiesTable');
            let tbody = table.tBodies[0];

            warranties.forEach(warranty => {
                let new_row = document.createElement('tr');

                let td0 = document.createElement('td');
                let yatemName = document.createElement('a');
                yatemName.setAttribute('href', `/edit-yatem-form/${warranty.yatem_id}`);
                yatemName.appendChild(document.createTextNode(warranty.yatem_name));
                td0.appendChild(yatemName);
                new_row.appendChild(td0);

                let td1 = document.createElement('td');
                let sponsorName = document.createElement('a');
                sponsorName.setAttribute('href', `/update-sponsor/${warranty.sponsor_id}`);
                sponsorName.appendChild(document.createTextNode(warranty.sponsor_name));
                td1.appendChild(sponsorName);
                new_row.appendChild(td1);

                let td2 = document.createElement('td');
                wrrantyAmount = document.createElement('span');
                wrrantyAmount.appendChild(document.createTextNode(warranty.amount));
                td2.appendChild(wrrantyAmount);
                new_row.appendChild(td2);

                let td3 = document.createElement('td');
                warrantyPayments = document.createElement('span');
                warrantyPayments.appendChild(document.createTextNode(warranty.payments));
                td3.appendChild(warrantyPayments);
                new_row.appendChild(td3);

                let td4 = document.createElement('td');
                warrantySpending = document.createElement('span');
                warrantySpending.appendChild(document.createTextNode(warranty.spending));
                td4.appendChild(warrantySpending);
                new_row.appendChild(td4);

                let td5 = document.createElement('td');
                warrantyStatus = document.createElement('span');
                warrantyStatus.appendChild(document.createTextNode(warranty.status));
                td5.appendChild(warrantyStatus);
                new_row.appendChild(td5);

                let td6 = document.createElement('td');
                warrantyStart = document.createElement('span');
                warrantyStart.appendChild(document.createTextNode(warranty.start));
                td6.appendChild(warrantyStart);
                new_row.appendChild(td6);

                let td7 = document.createElement('td');
                warrantyEnd = document.createElement('span');
                warrantyEnd.appendChild(document.createTextNode(warranty.end));
                td7.appendChild(warrantyEnd);
                new_row.appendChild(td7);

                


                tbody.appendChild(new_row);
            });
        } else {
            $("#warrantiesTable tbody tr").remove();

            let table = document.getElementById('warrantiesTable');
            let tbody = table.tBodies[0];
            let new_row = document.createElement('tr');

            let td1 = document.createElement('td');
            td1.setAttribute('colSpan', "8");

            let alert = document.createElement('div');
            alert.setAttribute('class', 'alert alert-info');
            alert.setAttribute('role', 'alert');
            alert.appendChild(document.createTextNode('لا يوجد كفالات'));

            td1.appendChild(alert);
            new_row.appendChild(td1);

            tbody.appendChild(new_row);
        }
    }

    getWarranties = (allPages = currentPage) => {
        document.getElementById('hidden_filter').value = JSON.stringify(filter);

        $.ajax({
            type: 'GET',
            url: `/warranties/warranties-list/${pageSize}?page=${allPages}&filter=${JSON.stringify(filter)}`,
            success: (response) => {
                renderWarranties(response);
            },
            error: (error) => {
                console.error(error);
            }
        });
    }

    $("#next-page").on("click", function () {
        currentPage = (currentPage + 1);
        document.getElementById('custom-page').value = currentPage;
        getWarranties();
    });

    $("#previous-page").on("click", function () {
        currentPage = (currentPage - 1);
        document.getElementById('custom-page').value = currentPage;
        getWarranties();
    });

    $("#first-page").on("click", function () {
        currentPage = 1;
        document.getElementById('custom-page').value = currentPage;
        getWarranties();
    });

    $("#last-page").on("click", function () {
        currentPage = totalPages;
        document.getElementById('custom-page').value = currentPage;
        getWarranties();
    });

    changePage = () => {
        let newPage = document.getElementById('custom-page').value;
        if (newPage != currentPage) {
            currentPage = newPage;
            getWarranties();
        }
    }

    changePageSize = () => {
        pageSize = $("#pageSize").val();
        getWarranties();
    }

    getWarranties();
});