@foreach ($categories as $category)

    @if( ( url()->current() == route('applyCategory',$category->id)) )
        <div class="shop-category__item" data-active="true">
            <span href="{{route('applyCategory',$category->id)}}">{{ $category->title }}</span>
        </div>
    @else
        <div class="shop-category__item">
            <a href="{{route('applyCategory',$category->id)}}">{{ $category->title }}</a>
        </div>
    @endif




@endforeach