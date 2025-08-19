<?php

it('successfully loads the home page', function () {
    $this->get('/')->assertStatus(200);
});

it('show category links in the header', function () {
    $this->get('/')->assertSeeInOrder([
        'All', 
        'Women',
        'Men'
    ]);
});