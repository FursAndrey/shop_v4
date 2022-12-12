<select class="form-select" {{ $attributes }}>
    @foreach ($options as $option)
        <option 
            @if(null !== $oldSelected)
                @if(is_array($oldSelected)) 
                    @selected(in_array($option->id, $oldSelected))
                @else
                    @selected($oldSelected == $option->id)
                @endif
            @endif
            value="{{ $option->id }}" 
            >
            {{ $option->id }} - {{ $option->name }}
        </option>
    @endforeach
</select>