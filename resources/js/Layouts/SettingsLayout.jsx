import { PropsWithChildren } from 'react'
import DashboardLayout from './DashboardLayout'
import SettingsSidebar from '@/Components/Settings/SettingsSidebar'

export default function SettingsLayout({ children }) {
  return (
    <DashboardLayout>
      <div className="flex flex-col space-y-8 lg:flex-row lg:space-x-12 lg:space-y-0">
        <aside className="-mx-4 lg:w-1/5">
          <SettingsSidebar />
        </aside>
        <div className="flex-1 lg:max-w-2xl">{children}</div>
      </div>
    </DashboardLayout>
  )
}
