<template>
    <div>
        <div>
            <button class="btn btn-primary btn-lg" v-on:click="luckyButton">Im feeling lucky</button>
            <div v-if="lucky">
                <h1 v-if="lucky.win">You WIN!</h1>
                <h2 v-else>You lose</h2>
                <p class="text-capitalize text-success" v-if="lucky.sum_win">{{(lucky.sum_win).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    })}}</p>
            </div>
        </div>
        <hr>
        <div>
            <button class="btn btn-info" v-on:click="luckyHistoryButton">History</button>
            <div v-if="lucky_history">
                <h1>Lucky History</h1>
                <div v-for="history in lucky_history">
                    <div class="row">
                        <div class="col">
                            <p class="text-success" v-if="history.win">You WIN!</p>
                            <p class="text-danger" v-else>You lose</p>
                        </div>

                        <div class="col"><p class="text-capitalize text-success" v-if="history.sum_win">
                            {{(history.sum_win).toLocaleString('en-US', {
                            style: 'currency',
                            currency: 'USD',
                            })}}</p></div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    </div>
</template>

<script>
    export default {
        name: "LuckyComponent",
        props: ['link'],
        computed: {
            lucky: function () {
                return this.$store.getters.LUCKY;
            },
            lucky_history: function () {
                return this.$store.getters.LUCKY_HISTORY;
            }
        },
        methods: {
            luckyButton: function () {
                this.$store.dispatch('LOAD_NEW_LUCKY', this.link);
            },
            luckyHistoryButton: function () {
                this.$store.dispatch('LOAD_LUCKY_HISTORY', this.link);

            }
        }
    }
</script>

<style scoped>

</style>
