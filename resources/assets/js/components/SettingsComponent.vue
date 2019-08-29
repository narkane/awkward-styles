<template>
    <div id="settings">
        <b-container class="bg-light box-shadow">
            <h3 class="border-bottom pb-4">Payment Settings</h3>
            <b-form-group class="pt-3">
                <label for="pp_acct">PayPal Email:</label>
                <input type="email" class="form-control" id="pp_acct" aria-describedby="ppHelp"
                       placeholder="PayPal Email.." />
                <small id="ppHelp" class="form-text text-muted">
                    We will never share your account information.
                </small>
            </b-form-group>
        </b-container>
    </div>
</template>

<script>
    export default {
        name: "Settings"
    }
</script>

<style scoped>

</style>