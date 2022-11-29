<script setup>
import AuthContent from '@/Components/Admin/AuthContent.vue';
import axios from 'axios';
import { VueEditor } from "vue3-editor";
</script>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                description: '',
                url: '',
                thumbnail: '',
                tags: ''
            },
            modalOpenUpload: false,
            image: '',
            file: null,
        }
    },
    methods: {
        showModalUpload() {
            this.modalOpenUpload = !this.modalOpenUpload
        },
        onFileUpload(e) {
            // creat blob from file
            const file = e.target.files[0]
            const url = URL.createObjectURL(file)
            this.image = url
            this.file = file
        },
        onUpload() {
            const formData = new FormData()
            formData.append('image', this.file)
            axios.post('/api/v1/upload', formData)
                .then(res => {
                    this.form.thumbnail = res.data.data.url
                    this.showModalUpload()
                })
                .catch(err => {
                    console.log(err)
                })
        },
        saveProject() {
            console.log(this.form)
            axios.post('/admin/projects/create', this.form)
                .then(res => {
                    window.location.href = '/admin/projects'
                })
                .catch(err => {
                    console.log(err)
                })
        },


    }
}
</script>

<template>
    <AuthContent>
        <div class="md:flex p-4">
            <div class="w-full md:w-2/3">
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                    id="title" type="text" placeholder="Title" v-model="form.name" />

                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                    id="url" type="text" placeholder="domain.com" v-model="form.url" />

                <div class="mb-20">
                    <VueEditor class="h-96" v-model="form.description"></VueEditor>
                </div>
            </div>

            <div class="w-full md:w-1/3">
                <div class="flex px-4">
                    <button @click="saveProject"
                        class="bg-blue-500 hover:bg-blue-700 text-white w-full font-bold py-2 px-4 rounded-lg">
                        Save
                    </button>
                </div>

                <div class="px-4 mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
                        Tags
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                        id="tags" type="text" placeholder="VueJS,ReactJS" v-model="form.tags" />
                </div>

                <div class="w-full p-4 rounded-lg">
                    <img class="object-cover w-full rounded-t-xl border shadow-sm" :src="image" alt="" :class="image == '' ? 'hidden' : ''">
                    <button @click="showModalUpload"
                        class="bg-blue-500 hover:bg-blue-700 text-white w-full font-bold py-2 px-4 rounded-b-lg">
                        Upload Image
                    </button>
                </div>
            </div>
        </div>

        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            :class="modalOpenUpload ? 'block' : 'hidden'" aria-modal="true">
            <div class="flex items end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-2xl md:text-xl leading-6 font-bold text-gray-900" id="modal-headline">
                                    Upload Thumbnail
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Please Upload your file here
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form input url -->
                    <div class="mx-4">
                        <!-- Drag and drop your file here -->
                        <img :src="image" class="w-full h-96 object-cover rounded-md p-2">
                        <input type="file" class="w-full rounded-md p-2" v-on:change="onFileUpload">
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                            @click="onUpload">
                            Upload
                        </button>
                        <button type="button" @click="showModalUpload"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthContent>
</template>