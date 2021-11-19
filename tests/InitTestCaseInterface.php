<?php

namespace Tests;

interface InitTestCaseInterface
{
    public function testListAll();

    public function testRequiredFieldsForCreation();

    public function testCreate();

    public function testShow();

    public function testUpdate();

    public function testDelete();

    public function transformRequestData(\Illuminate\Database\Eloquent\Model $mode): array;
}
