<template>
    <div class="bg-light">
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-12">
                <div class="text-right">
                    <button
                        type="button"
                        v-on:click="showNewCategoryModel"
                        class="btn btn-primary"
                    >
                        <span class="fa fa-plus"></span> New Category
                    </button>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(category, index) in categories"
                            :key="index"
                        >
                            <td>{{ index + 1 }}</td>
                            <td>{{ category.name }}</td>
                            <td>
                                <img
                                    :src="
                                        `${$store.state.serverPath}/storage/${category.image}`
                                    "
                                    :alt="category.name"
                                    style="max-height:120px;"
                                />
                            </td>
                            <td>
                                <button
                                    v-on:click="editCategory(category)"
                                    class="btn btn-primary btn-sm"
                                >
                                    <span class="fa fa-edit"></span>
                                </button>
                                <button
                                    v-on:click="deleteCategory(category)"
                                    class="btn btn-danger btn-sm"
                                >
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Create modal -->
        <b-modal ref="NewCategoryModel" hide-footer title>
            <div class="d-block text-center">
                <div class="card">
                    <div class="card-header">Add new categories</div>
                    <div class="card-body card-block">
                        <form v-on:submit.prevent="createCategory">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input
                                        type="text"
                                        id="name"
                                        v-model="categoryData.name"
                                        placeholder="Name"
                                        class="form-control"
                                    />
                                    <div
                                        style="width: 100%;margin-top: 0.25rem; font-size: 80%; color: #dc3545;text-align: left;"
                                        v-if="errors.name"
                                    >
                                        {{ errors.name[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input
                                        type="file"
                                        id="image"
                                        v-on:change="attachImage"
                                        placeholder="Image"
                                        class="form-control"
                                        ref="NewCategoryImage"
                                    />
                                    <div
                                        style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;text-align: left;"
                                        v-if="errors.image"
                                    >
                                        {{ errors.image[0] }}
                                    </div>
                                </div>
                            </div>
                            <div
                                v-if="categoryData.image.name"
                                class="text-left"
                            >
                                <img
                                    src
                                    ref="NewCategoryImageDisplay"
                                    style="max-width:110px;"
                                />
                            </div>

                            <div
                                class="form-actions form-group text-right pt-3"
                            >
                                <button
                                    type="button"
                                    v-on:click="hiddenNewCategoryModel"
                                    class="btn btn-danger btn-sm"
                                >
                                    <span class="fa fa-ban"></span> Cancle
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-success btn-sm"
                                >
                                    <span class="fa fa-check-circle"></span>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </b-modal>
        <!-- edit modal -->
        <b-modal ref="editCategoryModel" hide-footer title>
            <div class="d-block text-center">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body card-block">
                        <form v-on:submit.prevent="updateCategory">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input
                                        type="text"
                                        id="name"
                                        v-model="editCategoryData.name"
                                        placeholder="Name"
                                        class="form-control"
                                    />
                                    <div
                                        style="width: 100%;margin-top: 0.25rem; font-size: 80%; color: #dc3545;text-align: left;"
                                        v-if="errors.name"
                                    >
                                        {{ errors.name[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input
                                        type="file"
                                        id="image"
                                        v-on:change="editAttachImage"
                                        placeholder="Image"
                                        class="form-control"
                                        ref="editCategoryImage"
                                    />
                                    <div
                                        style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;text-align: left;"
                                        v-if="errors.image"
                                    >
                                        {{ errors.image[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <img
                                    :src="
                                        `${$store.state.serverPath}/storage/${editCategoryData.image}`
                                    "
                                    ref="editCategoryImageDisplay"
                                    style="max-width:110px;"
                                />
                            </div>

                            <div
                                class="form-actions form-group text-right pt-3"
                            >
                                <button
                                    type="button"
                                    v-on:click="hideEditCategoryModel"
                                    class="btn btn-danger btn-sm"
                                >
                                    <span class="fa fa-ban"></span> Cancle
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-success btn-sm"
                                >
                                    <span class="fa fa-check-circle"></span>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
import * as CategoryServices from "../services/category_service";
export default {
    name: "category",
    data() {
        return {
            categories: [],
            categoryData: {
                name: "",
                image: ""
            },
            editCategoryData: {},
            errors: {}
        };
    },
    mounted() {
        this.loadCategories();
    },
    methods: {
        //Fatch Data
        loadCategories: async function() {
            try {
                const response = await CategoryServices.loadCategories();
                //console.log(response);
                this.categories = response.data.data;
                //console.log(this.categories);
            } catch (error) {
                this.flashMessage.error({
                    message: "Oops! Some error, Please Refresh",
                    time: 5000
                });
            }
        },
        //attach insert Image
        attachImage() {
            this.categoryData.image = this.$refs.NewCategoryImage.files[0];
            let rander = new FileReader();
            rander.addEventListener(
                "load",
                function() {
                    this.$refs.NewCategoryImageDisplay.src = rander.result;
                }.bind(this),
                false
            );

            rander.readAsDataURL(this.categoryData.image);
        },
        //Hide Insert Modal
        hiddenNewCategoryModel() {
            this.$refs.NewCategoryModel.hide();
        },
        //Show Insert Modal
        showNewCategoryModel() {
            this.$refs.NewCategoryModel.show();
        },
        //Insert Data
        createCategory: async function() {
            let formData = new FormData();
            formData.append("name", this.categoryData.name);
            formData.append("image", this.categoryData.image);

            try {
                const response = await CategoryServices.createCategory(
                    formData
                );
                //console.log(response.data);
                this.categories.unshift(response.data);
                this.$refs.NewCategoryModel.hide();
                this.flashMessage.success({
                    message: "Category Create Success!",
                    time: 5000
                });
                this.categoryData = {
                    name: "",
                    image: ""
                };
            } catch (error) {
                //console.log(error.response.status);
                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;

                    default:
                        this.flashMessage.error({
                            message: "Oops! Some error, Please Try again",
                            time: 5000
                        });
                        //console.log(this.errors);
                        break;
                }
            }
            // console.log("Category Create Success!");
        },
        //Delete Data
        deleteCategory: async function(category) {
            if (
                !window.confirm(
                    `Are you sure you want to delete ${category.name}`
                )
            ) {
                return;
            }
            try {
                await CategoryServices.deleteCategory(category.id);
                this.categories = this.categories.filter(obj => {
                    return obj.id != category.id;
                });
                this.flashMessage.success({
                    message: "Category delete successfully!",
                    time: 5000
                });
            } catch (error) {
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },
        //Hide Edit Modal
        hideEditCategoryModel() {
            this.$refs.editCategoryModel.hide();
        },
        //Show Edit Modal
        showEditCategoryModel() {
            this.$refs.editCategoryModel.show();
        },
        //Edit Data
        editCategory(category) {
            this.editCategoryData = { ...category };
            this.$refs.editCategoryModel.show();
        },
        //Attach edit image
        editAttachImage() {
            this.editCategoryData.image = this.$refs.editCategoryImage.files[0];
            let rander = new FileReader();
            rander.addEventListener(
                "load",
                function() {
                    this.$refs.editCategoryImageDisplay.src = rander.result;
                }.bind(this),
                false
            );
            rander.readAsDataURL(this.editCategoryData.image);
        },
        //Update Data
        updateCategory: async function() {
            try {
                const formData = new FormData();
                formData.append("name", this.editCategoryData.name);
                formData.append("image", this.editCategoryData.image);
                formData.append("_method", "put");
                const response = await CategoryServices.updateCategory(
                    this.editCategoryData.id,
                    formData
                );
                this.categories.map(category => {
                    if (category.id == response.data.id) {
                        //console.log('ok');
                        category = response.data;
                    }
                });
                this.$refs.editCategoryModel.hide();
                this.flashMessage.success({
                    message: "Category edit successfully!",
                    time: 5000
                });
            } catch (error) {
                this.flashMessage.error({
                    message: error.response.data,
                    time: 5000
                });
            }
        }
    }
};
</script>
