<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use App\Models\Student;
use Tests\InitTestCase;
use Tests\InitTestCaseInterface;

class StudentTest extends InitTestCase implements InitTestCaseInterface
{
    private $base_url = 'api/admin/students';


    public function testRequiredFieldsForCreation()
    {
        $this->json('POST', $this->base_url, [], $this->getHeaderData())
            ->assertStatus(400)
            ->assertJson([
                "error" => "The name field is required."
            ]);
    }

    public function testListAll()
    {
        $this->json('GET', $this->base_url, [], $this->getHeaderData())
            ->assertStatus(200)
            ->assertJsonStructure([
                "data",
                "links",
                "meta"
            ]);
    }

    public function testCreate()
    {
        $model = factory(Student::class)->make();
        $request = $this->transformRequestData($model);
        $response = $this->json('POST', $this->base_url, $request, $this->getHeaderData());
        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                $response[0]
            ]);
    }

    public function testShow()
    {
        $model = factory(Student::class)->create();
        $this->json('GET', $this->base_url . '/' . $model->id, [], $this->getHeaderData())
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'id'     => $model->id,
                'name'     => $model->name,
                'grade'     => (string)$model->grade,
                'age'     => $model->age
            ]);
    }

    public function testUpdate()
    {
        $model = factory(Student::class)->create();
        $request = $this->transformRequestData(factory(Student::class)->make());
        $this->json('PUT', $this->base_url . '/' . $model->id, $request, $this->getHeaderData())
            ->assertStatus(Response::HTTP_OK)->assertJson([
                "success" => "Student updated successfully ."
            ]);
    }

    public function testDelete()
    {
        $model = factory(Student::class)->create();
        $this->json('DELETE', $this->base_url . '/' . $model->id, [], $this->getHeaderData())
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                "success" => "Student Deleted Successfully ."
            ]);
    }

    public function transformRequestData(\Illuminate\Database\Eloquent\Model $model): array
    {
        return [
            'id'     => $model->getAttribute('id'),
            'name'     => $model->getAttribute('name'),
            'age'     => $model->getAttribute('age'),
            'grade'     => $model->getAttribute('grade'),
            'schoole_id' => $model->getAttribute('schoole_id')
        ];
    }
}
