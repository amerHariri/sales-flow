<!-- Sidebar -->
<div id="sidebar">

    <div class="inner">

        <!-- Menu -->
        <nav id="menu">
            <ul>
                <li><a href="{{ route('theme.index') }}">Homepage</a></li>
                <li>
                    <span class="opener">Sales Operations</span>
                    <ul>
                        <li><a href="#">Sales List</a></li>
                        <li><a href="#">Add Sale</a></li>
                    </ul>
                </li>

                <li>
                    <span class="opener">Customers Operations</span>
                    <ul>
                        <li><a href="{{ route('customers.index') }}">Customers List</a></li>
                        <li><a href="{{ route('customers.create') }}">Add Customers</a></li>
                    </ul>
                </li>

                <li>
                    <span class="opener">Product Operations</span>
                    <ul>
                        <li><a href="{{ route('products.index') }}">Products List</a></li>
                        <li><a href="{{ route('products.create') }}">Add Product</a></li>
                    </ul>
                </li>

            </ul>
        </nav>


        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Copyright &copy; 2019 Company Name
                <br>Designed by <a rel="nofollow" href="https://www.facebook.com/templatemo">Template Mo</a>
            </p>
        </footer>

    </div>
</div>