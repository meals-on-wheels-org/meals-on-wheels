import { Head } from '@inertiajs/react'
import DashboardLayout from '@/Layouts/DashboardLayout'
import { Card, BarChart, Title, Text } from '@tremor/react'

export default function Analytics() {
  return (
    <>
      <Head title="Analytics" />
      <div className="grid gap-6">
        <Card>
          <Title>Analytics Overview</Title>
          <Text>Performance metrics and trends</Text>
          <BarChart
            data={[]}
            index="category"
            categories={["Views", "Conversions"]}
            colors={["blue", "green"]}
            className="h-72 mt-4"
          />
        </Card>
      </div>
    </>
  )
}

Analytics.layout = (page) => <DashboardLayout children={page} />
