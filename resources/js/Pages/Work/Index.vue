<template>
    <layout>
        <div class="pt-32 pb-16">
            <h1 class="font-hairline text-6xl text-center text-primary-800">Work</h1>
        </div>

        <div class="flex flex-wrap -mx-4 mb-16">
            <div class="w-full lg:w-1/2 xl:w-1/3 p-4" v-for="project in projects">
                <a :href="project.slug" class="group flex flex-col relative hover:z-50 transition-all ease-in-out transition-slow">
                    <div class="relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all ease-in-out transition-slow z-10">
                        <img class="rounded-lg filter-grayscale filter-primary group-hover:filter-none transition-all ease-in-out transition-slow" :src="'/storage/' + project.image_url" :alt="project.title" />
                        <div class="absolute inset-0 bg-primary-500 opacity-50 hover:opacity-25 transition-opacity ease-in-out transition-slow"></div>
                    </div>

                    <div class="absolute top-full inset-x-0 pt-6 px-3 pb-2 -mt-4 mx-2 bg-primary-800 rounded-b-lg shadow-lg opacity-0 group-hover:opacity-100 group-hover:h-auto transition-all ease-in-out transition-slow">
                        <h3 class="text-sm font-semibold text-primary-500" v-text="project.title"></h3>
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
