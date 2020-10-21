{{-- <ul>
    <li><a href="{{ route('shop') }}">Shop</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Blog</a></li>
    <li>
        <a href="{{ route('cart') }}">Cart <span class="cart-count">
            @if (Cart::instance('default')->count() > 0)
                <span>{{Cart::instance('default')->count()}}</span>
            @endif
            </span>
        </a>
    </li>
</ul> --}}

<ul>
    @guest
    <li><a href="{{ route ('register')}}">Register</a></li>
    <li><a href="{{ route ('login')}}">Log in</a></li>
    @else
    <li>
        <a class="dropdown-item" href="{{ route('users.edit') }}">
            My Account
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endguest
    <li><a href="{{ route ('cart')}}">Cart
        @if (Cart::instance('default')->count() > 0)
            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
        @endif</a></li>
    {{--@foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach--}}
</ul>