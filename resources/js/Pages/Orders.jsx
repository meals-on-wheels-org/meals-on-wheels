import { Head } from '@inertiajs/react'
import DashboardLayout from '@/Layouts/DashboardLayout'
import { Card, Title, Table } from '@tremor/react'

export default function Orders() {
  return (
    <>
      <Head title="Orders" />
      <Card>
        <Title>Recent Orders</Title>
        {/* Orders table */}
      </Card>
    </>
  )
}

Orders.layout = (page) => <DashboardLayout children={page} />
