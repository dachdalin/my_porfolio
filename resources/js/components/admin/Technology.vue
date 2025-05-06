<template>
    <AppLayout>
        <Toast v-if="showToastVisible" :type="toastType" :message="toastMessage" @close="showToastVisible = false"  />
        <div class="container bg-gray-100 dark:bg-gray-900 ">
            <div class="flex items-center justify-between py-8">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">Technology</h1>
                <button @click="openCreateModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add Technology
                </button>
            </div>
            <div v-if="loading" class="flex justify-center my-8">
                <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
            </div>

            <!-- Error State -->
            <div v-else-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ error }}
            </div>
            <div v-else class="bg-white shadow-md dark:shadow-custom-dark rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tech
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 dark:text-gray-200 divide-y divide-gray-200">
                        <tr v-if="products.data.length === 0">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-200">
                                No products found.
                            </td>
                        </tr>
                        <tr v-for="(product,index) in products.data" :key="product.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ index + 1 + (products.current_page - 1) * products.per_page }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ product.title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ truncateText(product.description) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div v-if="product.tech && product.tech.length">
                                    <div class="flex flex-wrap gap-2">
                                        <span v-for="(tech, index) in formatTechTags(product.tech)" :key="index"
                                            class="bg-blue-600 text-white rounded-lg py-1 px-2 flex items-center">
                                            {{ tech }}
                                        </span>
                                    </div>
                                </div>
                                <div v-else>
                                    <span class="text-gray-500 dark:text-gray-200">No technologies listed</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button @click="openEditModal(product)"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </button>
                                <button @click="confirmDelete(product)" class="text-red-600 hover:text-red-900">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="products.data && products.data.length > 0" class="mt-4 flex justify-between items-center">
                <div class="text-sm text-gray-700 dark:text-gray-200">
                    Showing {{ products.from }} to {{ products.to }} of
                    {{ products.total }} results
                </div>
                <div class="flex space-x-2">
                    <button v-for="page in getPageNumbers()" :key="page" @click="fetchProducts(page)" :class="[
                        'px-3 py-1 rounded',
                        page === products.current_page
                            ? 'bg-blue-600 text-white'
                            : 'bg-gray-200 hover:bg-gray-300',
                    ]">
                        {{ page }}
                    </button>
                </div>
            </div>
            <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl w-full max-w-3xl">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-4 text-gray-200 dark:text-gray-200">
                            {{ isEditing ? "Edit Technology" : "Add New Technology" }}
                        </h2>

                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input v-model="form.title" id="title" type="text"
                                    class="shadow appearance-none dark:text-white dark:bg-gray-900 border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2" for="slug">
                                    Slug (optional)
                                </label>
                                <input v-model="form.slug" id="slug" type="text"
                                    class="shadow appearance-none border dark:text-white dark:bg-gray-900 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                     />
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2" for="description">
                                    Description
                                </label>
                                <textarea v-model="form.description" id="description"
                                    class="shadow appearance-none border dark:text-white dark:bg-gray-900 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    rows="3"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm dark:text-gray-200 font-bold mb-2" for="tech">
                                    Tech
                                </label>
                                <input v-model="techInput" @keydown.enter.prevent="addTech"
                                    @keydown.tab.prevent="addTech" id="tech" type="text"
                                    class="shadow appearance-none border dark:bg-gray-900 dark:text-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Add tech (e.g., PHP, Laravel)" />
                            </div>
                            <div class="mb-4">
                                <div  v-if="form.tech.length" class="flex flex-wrap gap-2">
                                    <span v-for="(tech, index) in form.tech" :key="index"
                                        class="bg-blue-600 text-white py-1 px-2 rounded-full flex items-center">
                                        {{ tech }}
                                        <button @click="removeTech(index)" class="ml-2 text-white">x</button>
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button type="button" @click="showModal = false"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    :disabled="formSubmitting">
                                    {{ formSubmitting ? "Saving..." : "Save" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div v-if="showDeleteModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
                        <p class="mb-4">
                            Are you sure you want to delete the Technology "{{
                                productToDelete?.title
                            }}"? This action cannot be undone.
                        </p>

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="showDeleteModal = false"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </button>
                            <button type="button" @click="deleteProduct"
                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                :disabled="deleteSubmitting">
                                {{ deleteSubmitting ? "Deleting..." : "Delete" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "../layouts/AppLayout.vue";
import api from "../../services/api.js";
import Toast from "../Toast.vue";
export default {
    name: "Technology",
    components: {
        AppLayout,
        Toast,
    },
    data() {
        return {
            products: {
                data: [],
                current_page: 1,
                from: 0,
                to: 0,
                total: 0,
                last_page: 1,
            },
            loading: true,
            error: null,
            showModal: false,
            showDeleteModal: false,
            isEditing: false,
            formSubmitting: false,
            deleteSubmitting: false,
            productToDelete: null,
            form: this.getEmptyForm(),
            techInput: "",
            showToastVisible: false,
            toastMessage: '',
            toastType: '',
        };
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        addTech() {
            if (this.techInput.trim() !== '') {
                this.form.tech.push(this.techInput.trim());
                this.techInput = '';
            }
        },
        removeTech(index) {
            this.form.tech.splice(index, 1);
        },
        formatTechTags(tech) {
            return JSON.parse(tech).map((item) => item);
        },
        truncateText(text, length = 50) {
            if (text.length > length) {
                return text.substring(0, length) + "...";
            }
            return text;
        },
        getEmptyForm() {
            return {
                title: "",
                description: "",
                tech: [],
            };
        },
        async fetchProducts(page = 1) {
            this.loading = true;
            this.error = null;

            try {
                const response = await api.getProducts(page);
                this.products = response.data.data;
            } catch (error) {
                console.error("Error fetching products:", error);
                this.error = "Failed to load products. Please try again.";
            } finally {
                this.loading = false;
            }
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = this.getEmptyForm();
            this.showModal = true;
        },
        openEditModal(product) {
            this.isEditing = true;
            this.form = {
                ...product,
                tech: JSON.parse(product.tech) || [],
            };
            this.showModal = true;
        },
        async submitForm() {
            this.formSubmitting = true;

            try {
                if (this.isEditing) {
                    await api.updateProduct(this.form.id, this.form);
                } else {
                    await api.createProduct(this.form);
                }

                this.showModal = false;
                this.fetchProducts(this.products.current_page);
                this.showToast("success", this.isEditing ? "Product updated successfully!" : "Product created successfully!");
            } catch (error) {
                console.error("Error saving product:", error);
                alert("Failed to save product. Please try again.");
            } finally {
                this.formSubmitting = false;
            }
        },
        confirmDelete(product) {
            this.productToDelete = product;
            this.showDeleteModal = true;
        },
        async deleteProduct() {
            this.deleteSubmitting = true;

            try {
                await api.deleteProduct(this.productToDelete.id);
                this.showDeleteModal = false;
                this.fetchProducts(this.products.current_page);
                this.showToast("success", "Product deleted successfully!");
            } catch (error) {
                console.error("Error deleting product:", error);
                alert("Failed to delete product. Please try again.");
            } finally {
                this.deleteSubmitting = false;
            }
        },
        getPageNumbers() {
            const pages = [];
            for (let i = 1; i <= this.products.last_page; i++) {
                pages.push(i);
            }
            return pages;
        },
        showToast(type, message) {
            this.toastType = type;
            this.toastMessage = message;
            this.showToastVisible = true;
            setTimeout(() => {
                this.showToastVisible = false;
            }, 5000);
        },
        dismissToast() {
            this.showToastVisible = false;
        },
    },
};
</script>
