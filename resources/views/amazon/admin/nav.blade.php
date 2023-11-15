<div class=" bg-white d-flex justify-content-around" style="height: 80px">
    <div class=" mt-3">
        <a class="btn {{ Request::is('amazon/admin/addcategory') ? 'active' : '' }}" href="{{ route('addCategory') }}">
            <h5>
                Add Category
            </h5>
        </a>
    </div>
    <div class=" mt-3 ">
       <a class="btn {{ Request::is('amazon/admin/category') ? 'active' : '' }}" href="{{ route('CategoryList') }}">
           <h5>
               Category List
           </h5>
       </a>
   </div> 
    <div class=" mt-3">
        <a class="btn {{ Request::is('amazon/admin/addproduct') ? 'active' : '' }}" href="{{ route('addProduct') }}">
            <h5>
                Add Product 
            </h5>
        </a>
    </div>
    <div class=" mt-3 ">
        <a class="btn {{ Request::is('amazon/admin') ? 'active' : '' }}" href="{{ route('list') }}">
            <h5>
                Product List
            </h5>
        </a>
    </div>
    <div class=" mt-3 ">
        <a class="btn {{ Request::is('amazon/admin/userlist') ? 'active' : ''}}" href="{{ route('userlist') }}">
            <h5>
                User List
            </h5>
        </a>
    </div>
</div>
