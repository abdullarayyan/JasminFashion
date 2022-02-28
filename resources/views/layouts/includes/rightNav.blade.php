<div class="right-nav">
    <ul class="level1">
        <li>
            <span>عام</span>
        </li>
        <ul class="level2">
            <li>
                <a href="{{ url('/') }}">لوحة التحكم</a>
            </li>
        </ul>
    </ul>
{{--    <ul class="level1">--}}
{{--        <li>--}}
{{--            <span>إدارة الموظفين</span>--}}
{{--        </li>--}}
{{--        <ul class="level2">--}}
{{--            <li--}}
{{--                class="{{ Route::currentRouteName() === 'employees' || Route::currentRouteName() === 'update-employee' || Route::currentRouteName() === 'add-employee-form' ? 'active' : '' }}">--}}
{{--                <a href="{{ url('employees') }}">الموظفين</a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--    </ul>--}}
{{--    <ul class="level1">--}}
{{--        <li>--}}
{{--            <span>إدارة الكفلاء</span>--}}
{{--        </li>--}}
{{--        <ul class="level2">--}}
{{--            <li class="{{ (Route::currentRouteName() === 'sponsors' || Route::currentRouteName() === 'update-sponsor' || Route::currentRouteName() === 'add-sponsor-form') ? 'active' : '' }}">--}}
{{--                <a href="{{ url('sponsors') }}">الكفلاء</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ url('/warranties') }}">كفالات</a>--}}
{{--            </li>--}}
{{--            <li class="{{ (Route::currentRouteName() === 'warranties' || Route::currentRouteName() === 'add_warranty') ? 'active' : '' }}">--}}
{{--                <a href="{{ url('add_warranty_form') }}">إضافة كفالة</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </ul>--}}
{{--    <ul class="level1">--}}
{{--        <li>--}}
{{--            <span>إدارة الأيتام</span>--}}
{{--        </li>--}}
{{--        <ul class="level2">--}}
{{--            <li class="{{ ( Route::currentRouteName() === 'aytams' ||--}}
{{--                            Route::currentRouteName() === 'editYatemForm' ||--}}
{{--                            Route::currentRouteName() === 'add_yatem') ? 'active' : ''--}}
{{--                        }}">--}}
{{--                <a href="{{ url('aytams') }}">الأيتام</a>--}}
{{--            </li>--}}
{{--            <li class="{{ Route::currentRouteName() === 'fathers' ? 'active' : '' }}">--}}
{{--                <a href="{{ url('/fathers') }}">الآباء</a>--}}
{{--            </li>--}}
{{--            <li class="{{ Route::currentRouteName() === 'mothers' ? 'active' : '' }}">--}}
{{--                <a href="{{ url('/mothers') }}">الأمهات</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ url('/guardians') }}">الأوصياء</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </ul>--}}
{{--    <ul class="level1">--}}
{{--        <li>--}}
{{--            <span>العمليات</span>--}}
{{--        </li>--}}
{{--        <ul class="level2">--}}
{{--            <li>--}}
{{--                <a href="{{ url('/') }}">الصرفيات <label class="mb-0 mr-1 soon">Soon</label></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ url('/social-cases') }}">الحالات الإجتماعية</a>--}}
{{--            </li>--}}
{{--            <li class="{{ (Route::currentRouteName() === 'projects' || Route::currentRouteName() === 'update-project' || Route::currentRouteName() === 'add-project-form') ? 'active' : '' }}">--}}
{{--                <a href="{{ url('projects') }}">المشاريع و التوزيعات</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </ul>--}}

{{--    <ul class="level1">--}}
{{--        <li>--}}
{{--            <span>تقارير</span>--}}
{{--        </li>--}}
{{--        <ul class="level2">--}}

{{--            <li>--}}
{{--                <a href="{{ url('/yatem-18') }}">ايتام بلغوا سن الثامن عشر</a>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--    </ul>--}}

    <ul class="level1">
        <li>
            <span>المتجر</span>
        </li>
        <ul class="level2">

            <li>
                <a href="#">الموديلات</a>
            </li>

        </ul>

        <ul class="level2">
<hr style="margin: 0">
            <li>
                <a href="/product"> عرض الموديلات <i class="fa fa-eye" style="margin: 10px"></i></a>
            </li>
            <hr style="margin: 0">

            <li>
                <a href="/product/create">  اضافة موديل<i class="fa fa-plus" style="margin: 10px"></i>
                </a>
            </li>
        </ul>
    </ul>
</div>
