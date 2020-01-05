<template>
    <main>
        <header class="px-12 text-gray-600 text-sm">
            <div class="flex items-center w-full md:w-2/3 md:max-w-6xl md:mx-auto pt-24 pb-4">
                <inertia-link class="flex items-center focus:outline-none hover:opacity-75 focus:opacity-75 rounded-full"
                              :href="$route('home')">
                    <svg class="h-6 focus:outline-none text-primary-900" viewBox="0 0 397 106" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="53" cy="53" r="53"></circle>
                        <path d="M153.453 69.3555l3.106-3.3643 12.724 19.021h14.147l-17.598-26.1377 16.433-19.7974h-13.629L154.014 57.71h-.561V22.2559h-12.12v62.7563h12.12V69.3555zM183.556 85.0122h12.465V59.4783c0-6.1678 3.407-10.3515 10.739-10.3515 1.855 0 3.753.1725 4.659.5176V38.7752c-.906-.2156-2.114-.345-3.796-.345-7.074 0-10.438 4.7444-11.3 7.893h-.604v-7.2461h-12.163v45.9351zM225.303 85.7023c6.772 0 10.568-3.1486 12.293-6.4266h.561v5.7365h11.43V54.3457c0-11.7749-8.497-15.9587-18.978-15.9587-13.069 0-18.288 6.6854-18.719 14.1472h11.429c.518-2.7604 2.631-4.7445 7.074-4.7445 4.399 0 7.203 2.0703 7.203 6.1678v3.9681h-11.042c-10.61 0-16.347 5.4777-16.347 13.759 0 8.7125 6.168 14.0177 15.096 14.0177zm4.055-9.0576c-3.709 0-7.117-1.9409-7.117-5.8659 0-3.278 2.329-5.6071 7.117-5.6071h8.238v4.6151c0 4.0112-3.752 6.8579-8.238 6.8579zM259.029 85.0122h12.034v-35.756h10.006V39.681h-10.265v-3.4937c0-3.8387 2.07-5.1757 6.642-5.1757 1.639 0 3.666.1725 4.27.2587v-8.7988c-.863-.0863-3.537-.3882-6.685-.3882-11.301 0-16.002 3.6662-16.002 13.0257v4.572h-7.462v9.5752h7.462v35.756z"></path>
                        <path d="M287.751 39.681h-7.246v9.5752h6.987v22.7303c0 9.4889 4.055 13.2414 15.571 13.2414 2.803 0 6.038-.3451 6.944-.5176v-9.2302c-.82.0863-2.459.1726-3.968.1726-4.572 0-6.513-1.3802-6.513-5.6503V49.2562h10.136V39.681h-10.136V28.2943h-11.775V39.681zM332.044 85.8317c13.413 0 19.107-8.4969 19.495-14.4922h-11.344c-.474 2.8467-3.709 4.9601-8.195 4.9601-5.607 0-9.273-3.7524-9.273-9.4026v-2.1566h29.2v-5.1758c0-13.1982-8.41-21.307-20.487-21.307-11.473 0-20.617 7.2893-20.617 21.307v4.8739c0 13.9746 8.411 21.3932 21.221 21.3932zm-9.317-28.4237v-.3881c0-5.6934 3.537-9.489 8.799-9.489s8.713 3.7956 8.713 9.489v.3881h-17.512zM370.513 38.5164c-10.481 0-17.166 7.5912-17.166 20.4444v6.1246c0 12.9395 6.772 20.4444 17.037 20.4444 7.246 0 12.034-3.5799 13.371-7.85h.561v7.3324h11.99V22.2559h-12.163v23.8517h-.561c-1.552-4.27-6.081-7.5912-13.069-7.5912zm4.27 9.9634c5.435 0 9.36 4.0112 9.36 10.7398v5.1757c0 7.203-3.709 11.2142-9.23 11.2142-5.478 0-9.101-3.9681-9.101-11.5592v-4.0544c0-7.5049 3.58-11.5161 8.971-11.5161z"></path>
                    </svg>
                </inertia-link>

                <div class="flex-1"></div>

                <nav class="flex items-center">
                   <inertia-link class="ml-3 font-semibold text-primary-800 border-t-2 border-b-2 border-transparent hover:opacity-75 hover:border-primary-300 focus:opacity-75 focus:border-primary-300"
                        :class="{ 'border-primary-300': $current('work') }"
                        :href="$route('work')"
                        style="border-top-color: transparent !important;">Work</inertia-link>
<!--                    <inertia-link class="ml-3 hover:text-black" :href="$route('work')">Blog</inertia-link>-->
<!--                    <inertia-link class="ml-3 hover:text-black" :href="$route('work')">Support</inertia-link>-->
                    <contact-modal>
                        <button
                            class="flex items-center px-4 py-2 ml-4 font-semibold bg-primary-900 text-primary-500 rounded hover:shadow hover:opacity-75 focus:opacity-75 focus:shadow-outline focus:outline-none"
                            slot="trigger"
                            slot-scope="{ present }"
                            @click="present">
                            <svg class="mr-2 h-3 w-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                            Talk to Us
                        </button>
                    </contact-modal>
                </nav>
            </div>
        </header>

        <div class="px-12">
            <div class="w-full md:w-2/3 md:max-w-6xl md:mx-auto">
                <slot></slot>
            </div>
        </div>

        <flash-messages></flash-messages>
    </main>
</template>

<script>
    import ContactModal from '@/Shared/ContactModal';
    import FlashMessages from '@/Shared/FlashMessages';

    export default {
        components: { ContactModal, FlashMessages },
        props: {
            title: String
        },
        watch: {
            title: {
                immediate: true,
                handler (title) {
                    document.title = title ? `${title} - Krafted` : 'Krafted';
                }
            }
        }
    }
</script>
