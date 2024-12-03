import React, { useState, useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';

const Donation = ({ campaignId, donors }) => {
    const [donorId, setDonorId] = useState('');
    const [amount, setAmount] = useState('');
    const [paymentMethod, setPaymentMethod] = useState('Credit Card');

    const handleSubmit = (e) => {
        e.preventDefault();
        Inertia.post('/donations', { donor_id: donorId, amount, payment_method: paymentMethod, campaign_id: campaignId });
    };

    return (
        <div>
            <h1>Make a Donation</h1>
            <form onSubmit={handleSubmit}>
                <label>Donor:</label>
                <select value={donorId} onChange={(e) => setDonorId(e.target.value)}>
                    {donors.map(donor => (
                        <option key={donor.id} value={donor.id}>
                            {donor.name}
                        </option>
                    ))}
                </select>

                <label>Amount:</label>
                <input type="number" value={amount} onChange={(e) => setAmount(e.target.value)} />

                <label>Payment Method:</label>
                <select value={paymentMethod} onChange={(e) => setPaymentMethod(e.target.value)}>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>

                <button type="submit">Donate</button>
            </form>
        </div>
    );
};

export default Donation;
