$(document).ready(() => {
    let pageSize = 10;
    let numberOfItems;
    let limitPerPage = 2;
    let totalPages;
    let currentPage = 1;
    let columnSearchName;
    let columnSearchValue;

    let filter = {
        columns: {},
        sort: '',
        direction: 'asc'
    };

    let additionalFilters = {};

    let aytamsArr = [];
    let selectedAytams = [];
    let columns = [];
    let ar_columns = [];
    let columnsLength = 0;
    let isHeaderRendered = false;
    let previousViewId = undefined;


    const searchColumn = (value, id) => {
        columnSearchName = id;
        columnSearchValue = value;

        filter.columns[columnSearchName] = columnSearchValue;
        getAytams(0);
    }

    const changeSort = (columnName) => {
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
        } else if (filter.direction === 'asc') {
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
        getAytams(0);
    }

    const renderPaginationDetails = (dataObject) => {
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

    const renderTableHead = () => {
        if (!isHeaderRendered && columns && columns.length > 0) {
            $("#yatemsTable thead tr").remove();
            let table = document.getElementById('yatemsTable');
            let thead = table.tHead;
            let new_row = document.createElement('tr');
            let new_row_2 = document.createElement('tr');

            let thSelect = document.createElement('th');
            thSelect.style.width = '40px';
            thSelect.style.maxWidth = '40px';
            new_row.append(thSelect);


            let thSelectAll = document.createElement('th');
            thSelectAll.style.width = '40px';
            thSelectAll.style.maxWidth = '40px';

            let div = document.createElement('div');
            div.setAttribute('class', 'custom-control custom-checkbox');

            let input = document.createElement('input');
            input.setAttribute('type', 'checkbox');
            input.setAttribute('class', 'custom-control-input');
            input.setAttribute('id', 'selectAll');
            input.onchange = function () {
                selectAll();
            }

            let label = document.createElement('label');
            label.setAttribute('class', 'custom-control-label');
            label.setAttribute('for', 'selectAll');

            div.appendChild(input);
            div.appendChild(label);

            thSelectAll.appendChild(div);

            new_row_2.append(thSelectAll);

            columns.forEach((column, index) => {
                let th = document.createElement('th');
                th.setAttribute('class', `clickable ${column}_head`);
                th.appendChild(document.createTextNode(ar_columns[index]));
                th.onclick = function () {
                    changeSort(column);
                };
                let icon = document.createElement('i');
                icon.setAttribute('class', 'bx bxs-up-arrow');
                th.appendChild(icon);
                new_row.append(th);

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

            });

            thead.appendChild(new_row);
            thead.appendChild(new_row_2);

        }

        isHeaderRendered = true;
    }

    const renderTableBody = (response) => {
        if (response && response.data.length > 0) {
            $("#yatemsTable tbody tr").remove();

            const aytams = response.data;
            aytamsArr = aytams;
            let table = document.getElementById('yatemsTable');
            let tbody = table.tBodies[0];

            aytams.forEach((yatem, index) => {
                let new_row = document.createElement('tr');

                let tdSelect = document.createElement('td');
                tdSelect.setAttribute('style', 'width: 40px; max-width: 40px;');
                let inputDiv = document.createElement('div');
                inputDiv.setAttribute('class', 'custom-control custom-checkbox');
                let input = document.createElement('input');
                input.setAttribute('class', 'custom-control-input');
                input.setAttribute('type', 'checkbox');
                input.setAttribute('id', `checkbox_${yatem.id}`);
                inputDiv.appendChild(input);
                let label = document.createElement('label');
                label.setAttribute('class', 'custom-control-label');
                label.setAttribute('for', `checkbox_${yatem.id}`);
                inputDiv.appendChild(label);
                tdSelect.appendChild(inputDiv);
                new_row.appendChild(tdSelect);

                columns.forEach((column, columnIndex) => {
                    if (column === 'full_name') {
                        let td0 = document.createElement('td');
                        td0.setAttribute('class', 'yatem_name');
                        let link = document.createElement('a');
                        link.setAttribute('href', `/edit-yatem-form/${yatem.id}`);
                        let linkText = document.createTextNode(yatem.full_name);
                        link.appendChild(linkText);
                        td0.appendChild(link);
                        new_row.appendChild(td0);
                    } else if (column === 'idc') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.idc));
                        new_row.appendChild(td1);
                    } else if (column === 'family_members') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.family_members));
                        new_row.appendChild(td1);
                    } else if (column === 'needs') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.needs));
                        new_row.appendChild(td1);
                    } else if (column === 'health_status') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.health_status));
                        new_row.appendChild(td1);
                    } else if (column === 'city_id') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.city));
                        new_row.appendChild(td1);
                    } else if (column === 'locality_id') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.locality));
                        new_row.appendChild(td1);
                    } else if (column === 'address') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.address));
                        new_row.appendChild(td1);
                    } else if (column === 'birth_of_date') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.birth_of_date));
                        new_row.appendChild(td1);
                    } else if (column === 'mother_name') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.mother_name));
                        new_row.appendChild(td1);
                    } else if (column === 'mother_idc') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.mother_idc));
                        new_row.appendChild(td1);
                    } else if (column === 'mother_phone') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.mother_phone));
                        new_row.appendChild(td1);
                    } else if (column === 'mother_mobile_1') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.mother_mobile_1));
                        new_row.appendChild(td1);
                    } else if (column === 'guardian_name') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.guardian_name));
                        new_row.appendChild(td1);
                    } else if (column === 'guardian_idc') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.guardian_idc));
                        new_row.appendChild(td1);
                    } else if (column === 'guardian_relation') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.guardian_relation));
                        new_row.appendChild(td1);
                    } else if (column === 'mobile_1') {
                        let td1 = document.createElement('td');
                        td1.appendChild(document.createTextNode(yatem.mobile_1));
                        new_row.appendChild(td1);
                    } else if (column === 'address') {
                        let td3 = document.createElement('td');
                        td3.appendChild(document.createTextNode(yatem.address));
                        new_row.appendChild(td3);
                    } else if (column === 'yatom_reason') {
                        let td4 = document.createElement('td');
                        td4.appendChild(document.createTextNode(yatem.yatom_reason));
                        new_row.appendChild(td4);
                    } else if (column === 'created_at') {
                        let td4 = document.createElement('td');
                        td4.appendChild(document.createTextNode(moment(yatem.created_at).format('YYYY-MM-DD')));
                        new_row.appendChild(td4);
                    } else if (column === 'created_by') {
                        let td4 = document.createElement('td');
                        td4.appendChild(document.createTextNode(yatem.created_by));
                        new_row.appendChild(td4);
                    } else if (column === 'job_id') {
                        let td4 = document.createElement('td');
                        td4.appendChild(document.createTextNode(yatem.job_id));
                        new_row.appendChild(td4);
                    }
                });

                tbody.appendChild(new_row);
            });
        } else {
            $("#yatemsTable tbody tr").remove();

            let table = document.getElementById('yatemsTable');
            let tbody = table.tBodies[0];
            let new_row = document.createElement('tr');

            let td1 = document.createElement('td');
            td1.setAttribute('colSpan', columnsLength + 1);

            let alert = document.createElement('div');
            alert.setAttribute('class', 'alert alert-info');
            alert.setAttribute('role', 'alert');
            alert.appendChild(document.createTextNode('لا يوجد أيتام'));

            td1.appendChild(alert);
            new_row.appendChild(td1);

            tbody.appendChild(new_row);
        }
    }

    const renderAytams = (response) => {
        renderPaginationDetails(response);
        renderTableHead();
        renderTableBody(response);
    }

    const getAytams = (allPages = currentPage) => {
        document.getElementById('hidden_filter').value = JSON.stringify(filter);
        document.getElementById('hidden_additional_filters').value = additionalFilters;

        let pattern = '';
        if (window.location.href.indexOf("yatem-18") > -1) {
            document.getElementById('add-yatem').remove();
            document.getElementById('add_warranty_button').remove();
            document.getElementById('btn-modal-import').remove();
            pattern = '/yatem-18';

        }else if (window.location.href.indexOf("aytams") > -1){
            $('#add_warranty_button')[0].disabled = true;
            pattern = '/aytams';
        }

        $.ajax({
            type: 'GET',
            url: `${pattern}/aytams-list/${pageSize}?page=${allPages}&filter=${JSON.stringify(filter)}&additionalFilters=${additionalFilters}`,
            success: (response) => {
                renderAytams(response);
                bindYatemSelectEvent();
                document.getElementById('selectAll').checked = false;
            },
            error: (error) => {
                console.error(error);
            }
        });

    }

    const selectAll = () => {
        var checkboxes = document.querySelectorAll('[id^="checkbox_"]');
        checkboxes.forEach(checkbox => {
            $(checkbox).click();
        });
    }

    const bindYatemSelectEvent = () => {
        var checkboxes = document.querySelectorAll('[id^="checkbox_"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', (e) => {
                let fullId = checkbox.id;
                let yatemId = fullId.substring(9);

                if (selectedAytams.indexOf(yatemId) === -1) {
                    selectedAytams.push(yatemId);
                    updateYatemsToPass();
                } else {
                    selectedAytams.splice(selectedAytams.indexOf(yatemId), 1);
                    updateYatemsToPass();
                }

                if (selectedAytams.length > 0) {
                    $('#add_warranty_button')[0].disabled = false;
                } else {
                    $('#add_warranty_button')[0].disabled = true;
                }

                if (selectedAytams.length === aytamsArr.length) {
                    document.getElementById('selectAll').checked = true;
                } else {
                    document.getElementById('selectAll').checked = false;
                }
            });
        });
    }

    const updateYatemsToPass = () => {
        let aytamsInfoToPass = [];
        selectedAytams.map(yatemId => {
            let yatemInfo = aytamsArr.find(yatem => yatem.id == yatemId);

            aytamsInfoToPass.push({
                full_name: yatemInfo.full_name,
                id: yatemInfo.id
            });
        });

        document.getElementById('selected_aytams').value = JSON.stringify(aytamsInfoToPass);
    }

    const checkTabRequired = (currentTab) => {
        var $form = $(currentTab);
        let requeiredFields = $form.find('.required');
        isTabValid = false;

        if ($form.find('.required').filter(function () {
            return (this.value === '' || this.value === 'null')
        }).length > 0) {
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

    changePage = () => {
        let newPage = document.getElementById('custom-page').value;
        if (newPage != currentPage) {
            currentPage = newPage;
            getAytams();
        }
    }

    changePageSize = () => {
        pageSize = $("#pageSize").val();
        getAytams();
    }

    getYatemViewColumns = (viewId) => {
        if (viewId === 'create_new_view') {
            $('#add_yatem_view').modal('show')
            return;
        }

        $.ajax({
            type: 'GET',
            url: `/api/yatem-view/${viewId}`,
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

                getAytams();
            },
            error: err => {
                console.error(err);
            }
        });
    }

    $("#next-page").on("click", function () {
        currentPage = (currentPage + 1);
        document.getElementById('custom-page').value = currentPage;
        getAytams();
    });

    $("#previous-page").on("click", function () {
        currentPage = (currentPage - 1);
        document.getElementById('custom-page').value = currentPage;
        getAytams();
    });

    $("#first-page").on("click", function () {
        currentPage = 1;
        document.getElementById('custom-page').value = currentPage;
        getAytams();
    });

    $("#last-page").on("click", function () {
        currentPage = totalPages;
        document.getElementById('custom-page').value = currentPage;
        getAytams();
    });

    $('#view_type').on('select2:selecting', function (evt) {
        previousViewId = $('#view_type').val();
    });

    $('#add_yatem_view').on("hidden.bs.modal", function () {
        let selectedValue = $('#view_type').val();
        if (selectedValue === 'create_new_view') {
            $('#view_type').select2().select2('val', previousViewId);
        }
    });

    $(".select2").select2();

    $("#add_yatem_view_button").on('click', () => {
        if (checkTabRequired("#add_yatem_view_form")) {
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

                $('#add_yatem_view_form').submit();
            } else {
                $('#no_columns_selected').removeClass('hide');
            }
        }
    });

    getYatemViewColumns(1);

});
