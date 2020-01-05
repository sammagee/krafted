<template>
    <pose-transition>
        <box class="flex justify-end fixed bottom-0 right-0 left-0 mx-6 mb-6" style="transform-origin: bottom right;" v-if="notifications.length > 0">
            <pose-transition>
                <box
                    class="absolute bottom-0 right-0 cursor-pointer px-3 py-2 mt-2 bg-black text-white rounded shadow-md text-sm bg-primary-900 text-primary-300"
                    @click="hide(notifications[index])"
                    role="alert"
                    :key="index"
                    v-for="(item, index) in notifications"
                    v-if="item === notifications[notifications.length - 1]">
                    <div class="flex flex-1 items-center justify-between overflow-hidden text-sm">
                        <div v-html="item.message"></div>

                        <button class="opacity-50 hover:opacity-100 focus:opacity-100 focus:outline-none ml-6" @click="hide(index)">
                            <svg class="fill-current w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                        </button>
                    </div>
                </box>
            </pose-transition>
        </box>
    </pose-transition>
</template>

<script>
    import posed, { PoseTransition } from 'vue-pose';

    export default {
        components: {
            PoseTransition,
            Box: posed.div({
                enter: {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    transition: { duration: 300, ease: 'anticipate' }
                },
                exit: {
                    opacity: 0,
                    scale: 0.75,
                    y: 100,
                    transition: { duration: 300, ease: 'anticipate' }
                }
            })
        },

        data() {
            return {
                notifications: []
            }
        },

        created() {
            window.events.$on(
              'flash', (message, type) => this.flash(message, type)
            );

            if (this.$page.flash.message) this.flash(this.$page.flash.message);
        },

        methods: {
            flash (message, type = 'info') {
                this.notifications.unshift({
                    message: message,
                    type: type
                });

                setTimeout(this.hide, 2500);
            },

            hide (item = this.notifications[-1]) {
                let key = this.notifications.indexOf(item)
                this.notifications.splice(key, 1)
            }
        }
    }
</script>
