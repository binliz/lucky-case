<template>
    <div>
        <h2>Links Editor</h2>
        <div class="row" v-for="link in links">
            <div class="col">
                <a :href="link.link" v-if="link.active">{{ link.url }}</a>
                <span v-else>{{ link.url }}</span>
            </div>
            <div class="col-2">
                <template v-if="link.canchange">
                    <div>
                        <button class="btn btn-danger" v-on:click="deactivate(link.id)" v-if="link.active">&times;</button>
                        <button class="btn btn-success" v-on:click="activate(link.id)" v-else>&check;</button>
                    </div>
                </template>
                <template v-else>
                    <p class="text-danger">&#x23F0;</p>
                </template>
            </div>
        </div>
        <button v-on:click="addLink" class="btn btn-success">Add new link</button>
    </div>
</template>

<script>
    export default {
        name: "LinkComponent",
        mounted: function () {
            this.$store.dispatch('LOAD_LINKS');
        },
        computed: {
            links: function () {
                return this.$store.getters.LINKS;
            }
        },
        methods: {
            addLink: function () {
                this.$store.dispatch('ADD_LINK');
            },
            deactivate: function (id) {
                this.$store.dispatch('DEACTIVATE_LINK', id);
            },
            activate: function (id) {
                this.$store.dispatch('ACTIVATE_LINK', id);
            }

        }
    }
</script>

<style scoped>

</style>
