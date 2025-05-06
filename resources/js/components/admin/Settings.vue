<template>
    <AppLayout>
        <Toast v-if="showToastVisible" :type="toastType" :message="toastMessage" @close="showToastVisible = false"  />
        <div class="w-full max-w-4xl container mx-auto px-4 py-8">
            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 dark:border-gray-200 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-900">Settings</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="site-name" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Site
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.site_name" id="site-name" autocomplete="given-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="site-email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Site
                                    Email</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.site_email" id="site-email" autocomplete="family-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="link-in" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Linkin</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.link_in" id="link-in" autocomplete="family-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="link-git" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Link Git</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.link_git" id="link-git" autocomplete="family-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-full">
                                <label for="site-email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Site
                                    Keyword</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.site_keyword" id="site-email" autocomplete="family-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="descrition"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Description</label>
                                <div class="mt-2">
                                    <textarea v-model="form.description" id="descrition" rows="3"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="about_me"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">About Me</label>
                                <div class="mt-2">
                                    <textarea v-model="form.about_me" id="about_me" rows="3"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="in_toch"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Get In Toch</label>
                                <div class="mt-2">
                                    <textarea v-model="form.get_toch" id="in_toch" rows="3"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="google-tags" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Google
                                    Tags</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.google_tags" id="google-tags" autocomplete="family-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="google-analytics" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">Google
                                    Analytics</label>
                                <div class="mt-2">
                                    <input type="text" v-model="form.google_analytics" id="google-analytics"
                                        autocomplete="family-name"
                                        class="block w-full dark:bg-gray-900 dark:text-white rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-full">
                                <label for="meta_image" class="block text-sm font-medium text-gray-900 dark:text-gray-200">Meta
                                    Image</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" />
                                        </svg>
                                        <label for="meta_image" class="cursor-pointer text-indigo-600 hover:text-indigo-500">
                                        <span>Click to upload image</span>
                                        </label>
                                        <div class="mt-4">
                                            <input type="file" id="meta_image" @change="onImageChange" class="sr-only">
                                        </div>
                                        <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                        <p v-if="imagePreview" class="mt-4">Preview:</p>
                                        <img v-if="imagePreview" :src="imagePreview" alt="Preview"
                                            class="w-32 mt-2 rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-full">
                                <label for="meta_image" class="block text-sm font-medium text-gray-900 dark:text-gray-200">Personal
                                    Image</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" />
                                        </svg>
                                        <label for="meta_image" class="cursor-pointer text-indigo-600 hover:text-indigo-500">
                                        <span>Click to upload image</span>
                                        </label>
                                        <div class="mt-4">
                                            <input type="file" id="meta_image" @change="onImageChangePersonal" class="sr-only">
                                        </div>
                                        <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                        <p v-if="imagePreviewP" class="mt-4">Preview:</p>
                                        <img v-if="imagePreviewP" :src="imagePreviewP" alt="Preview"
                                            class="w-32 mt-2 rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>


    </AppLayout>
</template>
<script>
import AppLayout from "../layouts/AppLayout.vue";
import api from "../../services/api.js";
import Toast from "../Toast.vue";

export default {
    name: "Settings",
    components: {
        AppLayout,
        Toast,
    },
    data() {
        return {
            form: {
                site_name: "",
                site_email: "",
                link_in: "",
                link_git: "",
                site_keyword: "",
                description: "",
                google_tags: "",
                google_analytics: "",
                meta_image: null,
                personal_image: null,
                get_toch: "",
                about_me: "",
            },
            imagePreview: null,
            showToastVisible: false,
            toastMessage: '',
            toastType: '',
            apUrl: window.APP_URL,
        };
    },
    created() {
        this.fetchSettings();
    },
    methods: {
        async fetchSettings() {
            try {
                const response = await api.getConfigure();
                const settings = response.data.settings.reduce((acc, item) => {
                acc[item.key] = item.value;
                return acc;
                }, {});

                this.form = { ...this.form, ...settings };
                this.imagePreview = settings.meta_image ? `${this.apUrl}/images/meta/${settings.meta_image}` : null;
                this.imagePreviewP = settings.personal_image ? `${this.apUrl}/images/personal/${settings.personal_image}` : null;

            } catch (error) {
                this.showToast('error', 'Error fetching settings');
                console.error("Error fetching settings:", error);
            }
        },
        onImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.meta_image = file;
                this.imagePreview = URL.createObjectURL(file);
            }
        },
        onImageChangePersonal(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.personal_image = file;
                this.imagePreviewP = URL.createObjectURL(file);
            }
        },
        async submitForm() {
            const formData = new FormData();
            for (const key in this.form) {
                formData.append(key, this.form[key]);
            }
            try {
                const response = await api.postConfigure(formData);

                console.log(response.data.message);
                this.showToast('success', response.data.message);
            } catch (error) {
                this.showToast('error', 'Error saving settings');
                console.error("Error saving settings", error);
            }
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
