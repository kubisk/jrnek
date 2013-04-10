<?php

function base_url($url) {
	return CJrnek::Instance()->request->base_url . trim($url, '/');
}

function current_url() {
	return CJrnek::Instance()->request->current_url;
}