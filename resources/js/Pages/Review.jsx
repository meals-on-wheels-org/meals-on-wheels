import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';

const Review = ({ campaignId, donors }) => {
    const [donorId, setDonorId] = useState('');
    const [rating, setRating] = useState(5);
    const [comment, setComment] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        Inertia.post('/reviews', { donor_id: donorId, rating, comment, campaign_id: campaignId });
    };

    return (
        <div>
            <h1>Leave a Review</h1>
            <form onSubmit={handleSubmit}>
                <label>Reviewer:</label>
                <select value={donorId} onChange={(e) => setDonorId(e.target.value)}>
                    {donors.map(donor => (
                        <option key={donor.id} value={donor.id}>
                            {donor.name}
                        </option>
                    ))}
                </select>

                <label>Rating (1-5):</label>
                <input type="number" min="1" max="5" value={rating} onChange={(e) => setRating(e.target.value)} />

                <label>Comment:</label>
                <textarea value={comment} onChange={(e) => setComment(e.target.value)} />

                <button type="submit">Submit Review</button>
            </form>
        </div>
    );
};

export default Review;
