<div class="list-group">
	
	{{-- in categories table where parent_id == NULL select as parent --}}
	@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

		<a href="#main-{{ $parent->id }}" data-toggle="collapse" class="list-group-item list-group-item-action">
			<img src="{{ asset('images/categories/'.$parent->image) }}" width="50">
			{{ $parent->name }}
		</a>

		<div class="collapse 
		@if (Route::is('categories.show')) {{-- categories.show is get Frontend/CategoriesController show method and get the id what pass --}}
			@if (App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
				show
			@endif
		@endif
		" id="main-{{ $parent->id }}">

			<div class="child-rows">
				
				{{-- in categories table where parent_id == main id select as child --}}
				@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)

					<a href="{{ route('categories.show', $child->id) }}" class="list-group-item list-group-item-action 
						@if (Route::is('categories.show')) {{-- categories.show is get Frontend/CategoriesController show method and get the id what pass --}}
							@if ($child->id == $category->id) 
								active
							@endif
						@endif
						">
					<img src="{{ asset('images/categories/'.$child->image) }}" width="30">
					{{ $child->name }}
				</a>

				@endforeach
			</div>
		</div>
	@endforeach
</div>

