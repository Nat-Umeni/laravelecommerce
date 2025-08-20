<?php

it('successfully loads the home page', function () {
    $this->get('/')->assertStatus(200);
});

it('show category links in the header', function () {
    expect($this->get('/'))->toContainTextInTestId('desktop-nav-links', [
        'All',
        'Women',
        'Men'
    ]);
});