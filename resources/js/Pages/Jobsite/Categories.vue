<template>
    <AppLayout>
        <template #content>
            <div class="ms-2">
                <div class="container">
                    <!-- Add Job Category Section -->
                    <h2 class="text-center mb-4">Job Category Management</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Add New Job Category</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="categoryStore">
                                <!-- Image -->
                                <div>
                                    <div class="mb-4 d-flex justify-content-center">
                                        <img id="selectedImage"
                                            src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                            alt="example placeholder" style="width: 300px;" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn btn-primary btn-rounded">
                                            <label class="form-label text-white m-1" for="categoryImage">
                                                Choose Category Image
                                            </label>
                                            <input
                                                type="file"
                                                class="form-control d-none"
                                                id="categoryImage"
                                                @change="displaySelectedImage"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- Category Name -->
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                    <input
                                        type="text"
                                        v-model="category.name"
                                        class="form-control"
                                        id="categoryName"
                                        placeholder="Enter category name"
                                    />
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>

                    <!-- Display Job Categories Section -->
                    <h4 class="mb-3">Existing Job Categories</h4>
                    <div class="row" id="categoryList">
                        <div v-for="category in categories" :key="category.id" class="col-md-4 mb-4">
                            <div class="card">
                                <img :src="`/categoryImages/${category.category_image}`" class="card-img-top img-fluid" alt="Category Image" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ category.category_name }}</h5>
                                    <button class="btn btn-warning btn-sm me-2">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/App.vue";
import { Link } from "@inertiajs/vue3";
import axios from "axios";

export default {
    components: {
        AppLayout,
        Link,
    },
    data() {
        return {
            category: {
                name: "",
                image: null, // Store the selected file
            },
            categories: [], // List of categories
        };
    },
    async mounted() {
        await this.fetchCategories();
    },
    methods: {
        // Fetch existing categories
        async fetchCategories() {
            try {
                const response = await axios.get(route("fetch_categories"));
                this.categories = response.data;
            } catch (error) {
                console.error("Error fetching categories:", error);
            }
        },

        // Store a new category (including image)
        async categoryStore() {
            try {
                const formData = new FormData();
                formData.append("name", this.category.name);
                formData.append("image", this.category.image);

                // Send the image and category data to the backend
                await axios.post(route("store_category"), formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });

                // Reset fields and fetch updated categories
                this.category.name = "";
                this.category.image = null;
                document.getElementById("selectedImage").src =
                    "https://mdbootstrap.com/img/Photos/Others/placeholder.jpg";
                await this.fetchCategories();
            this.$inertia.visit('categories');

            } catch (error) {
                console.error("Error saving category:", error);
            }
        },

        // Preview the selected image before submission
        displaySelectedImage(event) {
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                this.category.image = fileInput.files[0];

                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById("selectedImage").src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        },
    },
};
</script>

<style scoped>
.card-img-top {
    height: 200px;
    object-fit: cover;
}
</style>
