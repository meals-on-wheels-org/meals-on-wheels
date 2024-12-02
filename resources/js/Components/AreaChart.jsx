import { AreaChart as TremorAreaChart } from '@tremor/react'

export function AreaChart({ data }) {
  return (
    <TremorAreaChart
      data={data}
      index="date"
      categories={["Sales", "Profit"]}
      colors={["indigo", "cyan"]}
      className="h-72"
    />
  )
}
