<?php

it('successfully loads the home page', function () {
    $this->get('/')->assertStatus(200);
});