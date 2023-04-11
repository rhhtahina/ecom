<?php

namespace App\Controllers;

use App\Models\ProductCategoryModel;

class ProductCategoriesController extends BaseController
{
    public function create()
    {
        if ($this->request->getMethod() == "get") {
            $model = new ProductCategoryModel();

            $data = [
                'records' => $model->paginate(1),
                'pager' => $model->pager,
            ];
            return view('product_categories/product_categories', $data);
        } else if ($this->request->getMethod() == "post") {
            if (!$this->validate([
                'name' => 'required|max_length[120]',
                'image' => 'uploaded[image]|ext_in[image,png,jpg,gif,html]'
            ])) {
                return redirect()->back()->withInput();
            } else {
                $name = $this->request->getVar("name");
                $image = $this->request->getFile("image");

                $new_name = $image->getRandomName();
                $image->move("./public/assets/images/product_categories", $new_name);

                $model = new ProductCategoryModel();

                $data = [
                    "name" => $name,
                    "image" => $new_name
                ];

                $model->insert($data);

                return redirect()->to(base_url(("admin/product_categories")));
            }
        }
    }
}
