@props(["property"])
<div>
	<input type="text" value="{{$property->propertyValue?->value}}" name="{{$property->code}}" placeholder="Entrez une valeur {{$property->value}}" class="form-control">
</div>
