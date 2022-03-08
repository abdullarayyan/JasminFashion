<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<div class="right-nav">
    <ul class="level1" style="margin: 0">

        <ul class="level2" style="margin: 0;">
            <li>
                <span>عام</span>
            </li>
            <li style="margin: 0;">
                <a href="{{ url('/') }}">لوحة التحكم</a>
            </li>
        </ul>
    </ul>
    <ul class="level1">
        <li>
            <span>المتجر</span>
        </li>
        <ul class="level2">
            <li>
                <a href="#" id="product">فساتين الزفاف
                    <i style="margin: 10px" id="p" class='fas fa-angle-left'></i>
                </a>
            </li>
        </ul>
        <hr style="margin: 0">
        <ul class="level2">
            <li>
                <a href="#" id="party">فساتين السهرة
                    <i style="margin: 10px" id="p" class='fas fa-angle-left'></i>
                </a>
            </li>
        </ul>
        <hr style="margin: 0">

        <ul class="level2">
            <li>
                <a href="#" id="accessory">الاكسسوارات
                    <i style="margin: 10px" class='fas fa-angle-left'></i>
                </a>
            </li>
        </ul>
    </ul>
</div>
<div class="right-nav hide" id="productsub" style="    margin-top: 172px; background-color: #fcefba">
    <ul class="level2">
        <hr style="margin: 0">
        <li>
            <a href="/product"> <i class="fa fa-eye" style="margin: 10px"></i>عرض </a>
        </li>
        <hr style="margin: 0">

        <li>
            <a href="/product/create"> <i class="fa fa-plus" style="margin: 10px"></i> اضافة
            </a>
        </li>
    </ul>
</div>

<div class="right-nav hide" id="subparty" style="margin-top: 238px; background-color: #fcefba">
    <ul class="level2">
        <hr style="margin: 0">
        <li>
            <a href="/party"> <i class="fa fa-eye" style="margin: 10px"></i>عرض </a>
        </li>
        <hr style="margin: 0">

        <li>
            <a href="/party/create"> <i class="fa fa-plus" style="margin: 10px"></i> اضافة
            </a>
        </li>
    </ul>
</div>

<div class="right-nav hide" id="accessorysub" style="margin-top: 306px; background-color: #fcefba ;">
{{--    width: 10%!important--}}
    <ul class="level2">
        <hr style="margin: 0">
        <li>
            <a href="/accessory"> <i class="fa fa-eye" style="margin: 10px"></i>عرض  </a>
        </li>
        <hr style="margin: 0">

        <li>
            <a href="/accessory/create"> <i class="fa fa-plus" style="margin: 10px"></i> اضافة
            </a>
        </li>
    </ul>
</div>



<script>
    $(document).ready(function () {
        $('li').find('#accessory').mouseover(function () {
            $("#accessorysub").show();
            $("#productsub").hide();
            $("#subparty").hide();

        })
        $('li').find('#product').mouseover(function () {
            $("#productsub").show();
            $("#accessorysub").hide();
            $("#subparty").hide();

        })

        $('li').find('#party').mouseover(function () {
            $("#productsub").hide();
            $("#accessorysub").hide();
            $("#subparty").show();

        })
    });
</script>

