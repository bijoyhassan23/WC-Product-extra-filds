<?php
if (!defined('ABSPATH')) exit;
?>

<!-- Modal 1: Date & Time -->
<div id="booking-modal-1" class="crystal-modal">
    <div class="crystal-modal-content">
        <span class="crystal-close">&times;</span>
        <h2>Select Date & Time</h2>

        <div class="booking-form-group">
            <label>Select Date</label>
            <input type="date" id="booking-date" min="<?php echo esc_attr(date('Y-m-d')); ?>" class="booking-input">
        </div>

        <div class="booking-form-group">
            <label>Timezone</label>
            <strong>Europe/Brussels</strong>
        </div>

        <div class="booking-form-group">
            <label>Service</label>
            <input type="text" id="booking-service" class="booking-input" readonly>
        </div>

        <div class="booking-form-group">
            <label>Team Member</label>
            <select id="booking-team-member" class="booking-input">
                <option value="">Select team member</option>
                <option value="brussels">Jeweller Brussels</option>
                <option value="antwerp">Jeweller Antwerp</option>
                <option value="ghent">Jeweller Ghent</option>
            </select>
        </div>

        <div class="booking-form-group">
            <label>Select Time Slot</label>
            <div class="time-slots-grid">
                <?php
                $slots = [
                    '09:00','09:15','09:30','10:00','10:15','10:30',
                    '11:00','14:00','14:15','15:00','16:00','17:00','18:00'
                ];
                foreach ($slots as $slot) {
                    echo '<button type="button" class="time-slot" data-time="'.esc_attr($slot).'">'.$slot.'</button>';
                }
                ?>
            </div>
        </div>

        <button class="button alt booking-next-btn" id="goto-modal-2">Continue</button>
    </div>
</div>

<!-- Modal 2: Questions -->
<div id="booking-modal-2" class="crystal-modal">
    <div class="crystal-modal-content">
        <span class="crystal-close">&times;</span>
        <h2>Additional Information</h2>

        <div class="booking-form-group">
            <label>Language</label>
            <select id="booking-language" class="booking-input">
                <option value="english">English</option>
                <option value="french">French</option>
                <option value="dutch">Dutch</option>
                <option value="german">German</option>
            </select>
        </div>

        <div class="booking-form-group">
            <label>Notes</label>
            <textarea id="booking-notes" rows="4" class="booking-input"></textarea>
        </div>

        <div class="booking-buttons">
            <button class="button booking-back-btn" id="back-to-modal-1">Back</button>
            <button class="button alt booking-next-btn" id="goto-modal-3">Continue</button>
        </div>
    </div>
</div>

<!-- Modal 3: Payment -->
<div id="booking-modal-3" class="crystal-modal">
    <div class="crystal-modal-content">
        <span class="crystal-close">&times;</span>
        <h2>Payment Option</h2>

        <div class="payment-options">
            <label class="payment-option">
                <input type="radio" name="payment-type" value="grillz"> <span>Grillz</span>
            </label>
            <label class="payment-option">
                <input type="radio" name="payment-type" value="tooth-gems"> <span>Tooth Gems</span>
            </label>
            <label class="payment-option">
                <input type="radio" name="payment-type" value="whitening"> <span>Teeth Whitening</span>
            </label>
        </div>

        <div class="booking-buttons">
            <button class="button booking-back-btn" id="back-to-modal-2">Back</button>
            <button class="button alt booking-next-btn" id="add-to-cart-booking">Add to Cart</button>
        </div>
    </div>
</div>
