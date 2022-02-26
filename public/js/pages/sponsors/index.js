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
        },
        sort: '',
        direction: 'asc'
    };

    let additionalFilters = {};

    let sponsorToDelete;
    let columns = [];
    let ar_columns = [];
    let columnsLength = 0;
    let isHeaderRendered = false;
    let previousViewId = undefined;

    searchColumn = (value, id) => {
        columnSearchName = id;
        columnSearchValue = value;

        filter.columns[columnSearchName] = columnSearchValue;
        getSponsors(0);
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
        getSponsors(0);
    }

    renderPaginationDetails = (dataObject) => {
        let from = dataObject.from || 0;
        let to = dataObject.to || 0;
        let total = dataObject.total;
        let message = `إظهار ${from} إلى ${to} من أصل ${total}`;
        document.getElementById("pagination_details").innerText = message;

        numberOfItems = dataObject.total;
        totalPages = dataObject.last_page;
        currentPage = dataObject.current_page;

        document.getElementById('last-page-link').innerText = totalPages;
        $("#previous-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage === totalPages);
    }

    renderTableHead = () => {
        if (!isHeaderRendered && columns && columns.length > 0) {
            $("#sponsorsTable thead tr").remove();
            let table = document.getElementById('sponsorsTable');
            let thead = table.tHead;
            let new_row = document.createElement('tr');
            let new_row_2 = document.createElement('tr');

            columns.forEach((column, index) => {
                let th = document.createElement('th');
                th.setAttribute('class', `clickable ${column}_head ${ column === 'actions' ? 'text-center hide-on-print' : '' }`);
                th.appendChild(document.createTextNode(ar_columns[index]));
                th.onclick = function () {
                    changeSort(column);
                };
                let icon = document.createElement('i');
                icon.setAttribute('class', 'bx bxs-up-arrow');
                th.appendChild(icon);
                new_row.append(th);

                if (column !== 'actions') {
                    let th2 = document.createElement('th');
                    let thInput = document.createElement('input');
                    thInput.setAttribute('type', 'text');
                    thInput.setAttribute('id', column);
                    thInput.setAttribute('placeholder', ar_columns[index]);
                    thInput.setAttribute('maxlength', 9);
                    thInput.onchange = function () {
                        searchColumn(this.value, this.id);
                    }
                    th2.appendChild(thInput);
                    new_row_2.append(th2);
                }

            });

            thead.appendChild(new_row);
            thead.appendChild(new_row_2);

        }

        isHeaderRendered = true;
    }

    renderTableBody = (response) => {
        if (response && response.data.length > 0) {
            $("#sponsorsTable tbody tr").remove();

            const sponsors = response.data;
            let table = document.getElementById('sponsorsTable');
            let tbody = table.tBodies[0];

            sponsors.forEach(sponsor => {
                let new_row = document.createElement('tr');

                columns.forEach((column, columnIndex) => {
                    if (column === 'full_name') {
                        let td0 = document.createElement('td');
                        td0.setAttribute('class', 'sponsor_name');
                        let link = document.createElement('a');
                        link.setAttribute('href', `/update-sponsor/${sponsor.id}`);
                        let linkText = document.createTextNode(sponsor.full_name);
                        link.appendChild(linkText);
                        td0.appendChild(link);
                        new_row.appendChild(td0);
                    }

                    else if (column === 'sponsor_number') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(sponsor.sponsor_number || ''));
                        new_row.appendChild(td1);
                    }

                    else if (column === 'sponsor_type') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(sponsor.sponsor_type || ''));
                        new_row.appendChild(td1);
                    }

                    else if (column === 'country') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(sponsor.country || ''));
                        new_row.appendChild(td1);
                    }

                    else if (column === 'address_1') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(sponsor.address_1 || ''));
                        new_row.appendChild(td1);
                    }

                    else if (column === 'phone_number') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(sponsor.phone_number || ''));
                        new_row.appendChild(td1);
                    }

                    else if (column === 'actions') {
                        let td5 = document.createElement('td');
                        td5.setAttribute('class', 'actions hide-on-print');
                        let icon = document.createElement('i');
                        icon.setAttribute('data-toggle', 'modal');
                        icon.setAttribute('data-target', '#confirmDeletModal');
                        icon.setAttribute('class', 'bx bx-trash');
                        icon.setAttribute('data-id', sponsor.id);
                        td5.appendChild(icon);
                        new_row.appendChild(td5);
                    }
                });

                tbody.appendChild(new_row);
            });
        } else {
            $("#sponsorsTable tbody tr").remove();

            let table = document.getElementById('sponsorsTable');
            let tbody = table.tBodies[0];
            let new_row = document.createElement('tr');

            let td1 = document.createElement('td');
            td1.setAttribute('colSpan', columnsLength + 1);

            let alert = document.createElement('div');
            alert.setAttribute('class', 'alert alert-info');
            alert.setAttribute('role', 'alert');
            alert.appendChild(document.createTextNode('لا يوجد كفلاء'));

            td1.appendChild(alert);
            new_row.appendChild(td1);

            tbody.appendChild(new_row);
        }
    }

    renderSponsors = (response) => {
        renderPaginationDetails(response);
        renderTableHead();
        renderTableBody(response);
    }

    getSponsors = (allPages = currentPage) => {
        document.getElementById('hidden_filter').value = JSON.stringify(filter);
        document.getElementById('hidden_additional_filters').value = additionalFilters;

        $.ajax({
            type: 'GET',
            url: `/sponsors/sponsors-list/${pageSize}?page=${allPages}&filter=${JSON.stringify(filter)}&additionalFilters=${additionalFilters}`,
            success: (response) => {
                renderSponsors(response);
            },
            error: (error) => {
                console.error(error);
            }
        });
    }

    $("#next-page").on("click", function () {
        currentPage = (currentPage + 1);
        document.getElementById('custom-page').value = currentPage;
        getSponsors();
    });

    $("#previous-page").on("click", function () {
        currentPage = (currentPage - 1);
        document.getElementById('custom-page').value = currentPage;
        getSponsors();
    });

    $("#first-page").on("click", function () {
        currentPage = 1;
        document.getElementById('custom-page').value = currentPage;
        getSponsors();
    });

    $("#last-page").on("click", function () {
        currentPage = totalPages;
        document.getElementById('custom-page').value = currentPage;
        getSponsors();
    });

    $('#view_type').on('select2:selecting', function (evt) {
        previousViewId = $('#view_type').val();
    });

    $('#add_sponsor_view').on("hidden.bs.modal", function () {
        let selectedValue = $('#view_type').val();
        if(selectedValue === 'create_new_view') {
            $('#view_type').select2().select2('val', previousViewId);
        }
    });

    changePage = () => {
        let newPage = document.getElementById('custom-page').value;
        if (newPage != currentPage) {
            currentPage = newPage;
            getSponsors();
        }
    }

    changePageSize = () => {
        pageSize = $("#pageSize").val();
        getSponsors();
    }

    getSponsorViewColumns = (viewId) => {
        if (viewId === 'create_new_view') {
            $('#add_sponsor_view').modal('show')
            return;
        }
        $.ajax({
            type: 'GET',
            url: `/api/sponsor-view/${viewId}`,
            success: res => {
                columns = res && res.columns.map(column => column.en_column_name);
                ar_columns = res && res.columns.map(column => column.ar_column_name);
                columnsLength = columns.length;
                filter.columns = {};

                columns.forEach(column => {
                    filter.columns[column] = "";
                });

                filter.sort = columns[0];
                isHeaderRendered = false;
                additionalFilters = res.filters;

                getSponsors();
            },
            error: err => {
                console.error(err);
            }
        });
    }

    getSponsorViewColumns(1);

    setSponsorToDelete = (employee_id) => {
        sponsorToDelete = employee_id;
    }

    $('#confirmDeletModal').on('show.bs.modal', function (e) {
        var sponsorId = $(e.relatedTarget).data('id');
        setSponsorToDelete(sponsorId);
    });

    deleteSponsor = () => {
        showLoading();
        $.ajax({
            type: "POST",
            url: "/deleteSponsor",
            data: {
                'sponsor_id': sponsorToDelete
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

    $(".select2").select2();

    checkTabRequired = (currentTab) => {
        var $form = $(currentTab);
        let requeiredFields = $form.find('.required');
        isTabValid = false;

        if ($form.find('.required').filter(function () { return (this.value === '' || this.value === 'null') }).length > 0) {
            isTabValid = false;
        } else {
            isTabValid = true;
        }

        for (let i = 0; i < requeiredFields.length; i++) {
            if (requeiredFields[i].value === '' || requeiredFields[i].value === 'null') {
                $(requeiredFields[i]).parent().addClass('required_errors');
            } else {
                $(requeiredFields[i]).parent().removeClass('required_errors');
            }
        }

        return isTabValid;
    }

    $("#add_sponsor_view_button").on('click', () => {
        if (checkTabRequired("#add_sponsor_view_form")) {
            let list2 = document.getElementById('list2');
            let children = list2.children;
            let childrenCount = children.length;

            if (childrenCount > 0) {
                $('#no_columns_selected').addClass('hide');

                let view_columns = [];

                for (let i = 0; i < childrenCount; i++) {
                    view_columns.push(children[i].dataset.value);
                }
                document.getElementById('view_columns').value = JSON.stringify(view_columns);

                let Selectedcheckboxes = document.querySelectorAll('.filters-list [id$=_checkbox]:checked');
                let additionalFilters = {};

                for (let i = 0; i < Selectedcheckboxes.length; i++) {
                    let e = Selectedcheckboxes[i];
                    let dataId = e.dataset.id;
                    let operator = document.getElementById(`${dataId}_operator`).value;
                    let value = document.getElementById(`${dataId}_input`).value;
                    additionalFilters[dataId] = operator + value;
                }

                document.getElementById('additional_filters').value = JSON.stringify(additionalFilters);

                $('#add_sponsor_view_form').submit();
            } else {
                $('#no_columns_selected').removeClass('hide');
            }
        }
    });
});