import { Head } from '@inertiajs/react'
import DashboardLayout from '@/Layouts/DashboardLayout'
import { Card, Title } from '@tremor/react'

export default function Settings() {
  return (
    <>
      <Head title="Settings" />
      <Card>
        <Title>Account Settings</Title>
        {/* Settings form */}
      </Card>
    </>
  )
}

Settings.layout = (page) => <DashboardLayout children={page} />
