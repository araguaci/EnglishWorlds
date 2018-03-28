<?php

function create($model, $properties = [], $method = 'create')
{
  return factory($model)->$method($properties);
}
