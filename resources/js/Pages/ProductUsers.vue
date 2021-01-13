<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products Management
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card card-body shadow-sm">
                    <div class="ml-auto my-3">
                        <button @click="openModal()" class="btn btn-primary">Add User</button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">ID</th>
                                <th class="px-4 py-2">Username/Email</th>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2" style="width:200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in data">
                                <td class="px-4 py-2">{{ row.id }}</td>
                                <td class="px-4 py-2">{{ row.ownername }}</td>
                                <td class="px-4 py-2">{{ row.devicename }}</td>
                                <td class="px-4 py-2">
                                    <button @click="edit(row)" class="btn btn-primary rounded my-1" style="width:60px">
                                        Edit
                                    </button>
                                    <button @click="deleteRow(row)" class="btn btn-danger rounded my-1"
                                        style="width:80px">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                            <div class="fixed inset-0 transition-opacity">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <form>
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="">
                                            <div class="mb-4">
                                                <label for="title"
                                                    class="block text-gray-700 text-sm font-bold mb-2">Owner:</label>
                                                <select class="form-control" id="category" v-model="form.ownerename">
                                                    <option v-for="row in data3" :value="row.id">
                                                        {{row.name}}
                                                        </option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="category"
                                                    class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                                                <select class="form-control" id="category" v-model="form.devicename">
                                                    <option v-for="row in data3" :value="row.id">
                                                        {{row.name}}
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <button wire:click.prevent="store()" type="button" class="btn btn-success"
                                                v-show="!editMode" @click="save(form)">
                                                Save
                                            </button>
                                        </span>
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <button wire:click.prevent="store()" type="button" class="btn btn-primary"
                                                v-show="editMode" @click="update(form)">
                                                Update
                                            </button>
                                        </span>
                                        <span class="flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                                            <button @click="closeModal()" type="button" class="btn btn-danger">
                                                Cancel
                                            </button>
                                        </span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props: ['data', 'errors'],
        data() {
            return {
                editMode: false,
                isOpen: false,
                form: {
                    title: null,
                    body: null,
                },
            }
        },
        methods: {
            openModal: function () {
                this.isOpen = true;
            },
            closeModal: function () {
                this.isOpen = false;
                this.reset();
                this.editMode = false;
            },
            reset: function () {
                this.form = {
                    title: null,
                    body: null,
                }
            },
            save: function (data) {
                this.$inertia.post('/userdevices', data)
                this.reset();
                this.closeModal();
                this.editMode = false;
            },
            edit: function (data) {
                this.form = Object.assign({}, data);
                this.editMode = true;
                this.openModal();
            },
            update: function (data) {
                data._method = 'PUT';
                this.$inertia.post('/userdevices/' + data.id, data)
                this.reset();
                this.closeModal();
            },
            deleteRow: function (data) {
                if (!confirm('Are you sure want to remove?')) return;
                data._method = 'DELETE';
                this.$inertia.post('/userdevices/' + data.id, data)
                this.reset();
                this.closeModal();
            }
        }
    }

</script>
