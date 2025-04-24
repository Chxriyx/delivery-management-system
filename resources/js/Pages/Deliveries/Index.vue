<script setup>
import { router, usePage } from '@inertiajs/vue3'

const { deliveries } = usePage().props

function goToPage(url) {
  if (url) router.visit(url)
}

function updateStatus(deliveryId, status) {
    router.put(`/deliveries/${deliveryId}/status`, { status })
    .then(() => {
      router.reload()
    })
    .catch(error => {
      console.error(error)
    })
}


</script>

<template>
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Deliveries</h1>

    <table class="min-w-full bg-white border rounded">
      <thead>
        <tr class="bg-gray-100">
          <th class="p-3 border">Pickup Name</th>
          <th class="p-3 border">Delivery Name</th>
          <th class="p-3 border">Type</th>
          <th class="p-3 border">Provider</th>
          <th class="p-3 border">Priority</th>
          <th class="p-3 border">Pickup Date</th>
          <th class="p-3 border">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="delivery in deliveries.data" :key="delivery.id" class="hover:bg-gray-50">
          <td class="p-3 border">{{ delivery.pickup_name }}</td>
          <td class="p-3 border">{{ delivery.delivery_name }}</td>
          <td class="p-3 border">{{ delivery.type_of_good }}</td>
          <td class="p-3 border">{{ delivery.delivery_provider }}</td>
          <td class="p-3 border">{{ delivery.priority }}</td>
          <td class="p-3 border">{{ delivery.pickup_date }}</td>
          <td class="p-3 border">
                <span
                    :class="{
                    'px-2 py-1 rounded text-xs font-semibold': true,
                    'bg-yellow-100 text-yellow-800': delivery.status === 'Pending',
                    'bg-blue-100 text-blue-800': delivery.status === 'Shipped',
                    'bg-red-100 text-red-800': delivery.status === 'Cancelled'
                    }"
                >
                    {{ delivery.status }}
                </span>

                <select
                    class="ml-2 border rounded p-1 text-sm"
                    v-model="delivery.status"
                    @change="updateStatus(delivery.id, delivery.status)"
                    >
                    <option value="Shipped">Shipped</option>
                    <option
                        value="Cancelled"
                        :disabled="delivery.status === 'Shipped'"
                    >
                        Cancelled
                    </option>
                </select>
        </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4">
      <button
        v-if="deliveries.prev_page_url"
        @click="goToPage(deliveries.prev_page_url)"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
      >
        Previous
      </button>

      <span>Page {{ deliveries.current_page }} of {{ deliveries.last_page }}</span>

      <button
        v-if="deliveries.next_page_url"
        @click="goToPage(deliveries.next_page_url)"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
      >
        Next
      </button>
    </div>
  </div>
</template>
