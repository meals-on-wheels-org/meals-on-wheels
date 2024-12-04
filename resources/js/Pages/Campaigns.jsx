import React, { useEffect, useState } from 'react';
import { Inertia } from '@inertiajs/inertia';

const Campaigns = ({ campaigns }) => {
    return (
        <div>
            <h1>Fundraising Campaigns</h1>
            <ul>
                {campaigns.map(campaign => (
                    <li key={campaign.id}>
                        <h2>{campaign.title}</h2>
                        <p>{campaign.description}</p>
                        <p>Goal: ${campaign.goal_amount}</p>
                        <p>Start Date: {campaign.start_date}</p>
                        <p>End Date: {campaign.end_date}</p>
                        <button onClick={() => Inertia.get(`/donations/create/${campaign.id}`)}>Donate</button>
                        <button onClick={() => Inertia.get(`/reviews/create/${campaign.id}`)}>Leave a Review</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Campaigns;
