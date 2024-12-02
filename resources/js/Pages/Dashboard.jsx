import { Head } from '@inertiajs/react'
import DashboardLayout from '@/Layouts/DashboardLayout'
import { Card, AreaChart, Title, Text } from '@tremor/react'

export default function Dashboard() {
  return (
    <>
      <Head title="Dashboard" />
      <div className="grid gap-6">
        <Card>
          <Title>Performance Overview</Title>
          <Text>Daily metrics and key indicators</Text>
          <AreaChart
            data={[]}
            index="date"
            categories={["Revenue", "Profit"]}
            colors={["indigo", "rose"]}
            className="h-72 mt-4"
          />
        </Card>
      </div>
    </>
  )
}

Dashboard.layout = (page) => <DashboardLayout children={page} />

