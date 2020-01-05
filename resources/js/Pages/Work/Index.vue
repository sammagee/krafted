<template>
    <layout>
        <div class="pt-32 pb-16">
            <h1 class="font-hairline text-6xl text-center text-primary-800">Work</h1>
        </div>

        <div class="flex flex-wrap justify-center -mx-4 mb-16">
            <div class="w-full lg:w-1/2 xl:w-1/3 p-4" v-for="project in projects">
                <a :href="project.slug" class="group flex flex-col relative hover:z-50 transition-all ease-in-out transition-slow">
                    <div class="relative overflow-hidden rounded-lg shadow-md group-hover:shadow-xl transition-all ease-in-out transition-slow z-10">
                        <img class="rounded-lg filter-grayscale filter-primary group-hover:filter-none transition-all ease-in-out transition-slow" :src="'/storage/' + project.image_url" :alt="project.title" />
                        <div class="absolute inset-0 bg-primary-500 opacity-50 group-hover:opacity-25 transition-opacity ease-in-out transition-slow"></div>
                    </div>

                    <div class="flex justify-between absolute top-full inset-x-0 pt-6 px-3 pb-2 -mt-4 mx-2 bg-primary-800 rounded-b-lg shadow-lg opacity-0 group-hover:opacity-100 group-hover:h-auto transition-all ease-in-out transition-slow">
                        <h3 class="text-sm font-semibold text-primary-500" v-text="project.title"></h3>

                        <a :href="project.link" target="_blank" rel="noopener">
                            <svg class="ml-2 h-4 w-4 text-primary-500 hover:opacity-75 focus:opacity-75 transition-all ease-in-out transition-slow" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>
                        </a>
                    </div>
                </a>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout';

    export default {
        components: {
            Layout
        },

        props: {
            projects: Array,
        },
    }
</script>

<style>
    .top-full {
        top: 100%;
    }
</style>
