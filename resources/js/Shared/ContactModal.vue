<template>
    <div class="relative" @keyup.esc="close">
        <pose-transition>
            <overlay class="fixed inset-0 w-full h-full cursor-default bg-primary-500" v-if="open"
                    @click.native="close"></overlay>
        </pose-transition>

        <slot
            name="trigger"
            :present="present"></slot>

        <pose-transition>
            <modal class="absolute right-0 top-0 w-64 bg-primary-400 rounded shadow-md overflow-hidden" style="transform-origin: top right"
                v-if="open">
                <form @submit.prevent="send">
                    <div class="border-b border-primary-500">
                        <label for="name" class="sr-only">Name</label>
                        <input class="px-3 py-2 w-full placeholder-primary-600 bg-transparent text-primary-900 border-0" type="text"
                            name="name" id="name"
                            placeholder="Name" ref="name" v-model="form.name">
                        <div class="px-3 text-xs mb-2" v-if="errors.name">
                            <span class="px-2 py-1 bg-primary-500 text-primary-900 rounded-full">{{ errors.name[0] }}</span>
                        </div>
                    </div>

                    <div class="border-b border-primary-500">
                        <label for="email" class="sr-only">Email</label>
                        <input class="px-3 py-2 w-full placeholder-primary-600 bg-transparent text-primary-900 border-0" type="email"
                            name="email" id="email"
                            placeholder="Email" ref="email" v-model="form.email">
                        <div class="px-3 text-xs mb-2" v-if="errors.email">
                            <span class="px-2 py-1 bg-primary-500 text-primary-900 rounded-full">{{ errors.email[0]
                                }}</span>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="sr-only">Message</label>
                        <textarea class="px-3 py-2 resize-none w-full placeholder-primary-600 bg-transparent text-primary-900 border-0" name="message"
                                id="message" placeholder="Message" ref="message" @input="resize"
                                v-model="form.message"></textarea>
                        <div class="px-3 text-xs mb-2" v-if="errors.message">
                            <span
                                class="px-2 py-1 bg-primary-500 text-primary-900 rounded-full">{{ errors.message[0] }}</span>
                        </div>
                    </div>

                    <footer class="flex justify-end p-1">
                        <button type="button" class="px-4 py-2 rounded font-semibold text-primary-900 hover:opacity-75 focus:opacity-75 focus:shadow-outline focus:outline-none"
                                @click="close">
                            Cancel
                        </button>

                        <button
                            class="ml-1 flex items-center px-4 py-2 font-semibold bg-primary-900 text-primary-500 rounded hover:shadow hover:opacity-75 focus:opacity-75 focus:shadow-outline focus:outline-none">
                            <svg class="mr-2 h-3 w-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                            Send
                        </button>
                    </footer>
                </form>
            </modal>
        </pose-transition>
    </div>
</template>

<script>
    import axios from 'axios';
    import posed, { PoseTransition } from 'vue-pose';

    export default {
        components: {
            PoseTransition,
            Modal: posed.div({
                enter: {
                    opacity: 1,
                    scale: 1,
                    transition: { duration: 250, ease: 'anticipate' }
                },
                exit: {
                    opacity: 0,
                    scale: 0.75,
                    transition: { duration: 250, ease: 'anticipate' }
                }
            }),

            Overlay: posed.button({
                enter: {
                    opacity: 0.9,
                    transition: { duration: 250, ease: 'anticipate' }
                },
                exit: {
                    opacity: 0,
                    transition: { duration: 250, ease: 'anticipate' }
                }
            })
        },

        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    message: null
                },
                open: false,
                errors: {}
            }
        },

        methods: {
            close() {
                this.open = false;
                this.errors = {};
                this.form.name = null;
                this.form.email = null;
                this.form.message = null;
            },

            present() {
                let vm = this;
                vm.open = true;
                vm.$nextTick(() => {
                    vm.$refs.name.focus();
                });
            },

            resize() {
                let message = this.$refs.message;
                message.style.height = '';
                message.style.height = Math.min(message.scrollHeight, 150) + 'px';
            },

            send() {
                axios.post(this.$route('contact'), this.form)
                    .then(async (res) => {
                        await this.$inertia.visit(this.$route('home'));
                        this.$flash(res.data.message, 'success');
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                        this.$flash(error.response.data.message, 'error');
                    });
            }
        }
    }
</script>
