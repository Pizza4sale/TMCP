<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/recaptchaenterprise/v1/recaptchaenterprise.proto

namespace Google\Cloud\RecaptchaEnterprise\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Fraud signals describing users and cards involved in the transaction.
 *
 * Generated from protobuf message <code>google.cloud.recaptchaenterprise.v1.FraudSignals</code>
 */
class FraudSignals extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Signals describing the end user in this transaction.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FraudSignals.UserSignals user_signals = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $user_signals = null;
    /**
     * Output only. Signals describing the payment card or cards used in this
     * transaction.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FraudSignals.CardSignals card_signals = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $card_signals = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\UserSignals $user_signals
     *           Output only. Signals describing the end user in this transaction.
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\CardSignals $card_signals
     *           Output only. Signals describing the payment card or cards used in this
     *           transaction.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Recaptchaenterprise\V1\Recaptchaenterprise::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Signals describing the end user in this transaction.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FraudSignals.UserSignals user_signals = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\UserSignals|null
     */
    public function getUserSignals()
    {
        return $this->user_signals;
    }

    public function hasUserSignals()
    {
        return isset($this->user_signals);
    }

    public function clearUserSignals()
    {
        unset($this->user_signals);
    }

    /**
     * Output only. Signals describing the end user in this transaction.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FraudSignals.UserSignals user_signals = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\UserSignals $var
     * @return $this
     */
    public function setUserSignals($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\UserSignals::class);
        $this->user_signals = $var;

        return $this;
    }

    /**
     * Output only. Signals describing the payment card or cards used in this
     * transaction.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FraudSignals.CardSignals card_signals = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\CardSignals|null
     */
    public function getCardSignals()
    {
        return $this->card_signals;
    }

    public function hasCardSignals()
    {
        return isset($this->card_signals);
    }

    public function clearCardSignals()
    {
        unset($this->card_signals);
    }

    /**
     * Output only. Signals describing the payment card or cards used in this
     * transaction.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FraudSignals.CardSignals card_signals = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\CardSignals $var
     * @return $this
     */
    public function setCardSignals($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\FraudSignals\CardSignals::class);
        $this->card_signals = $var;

        return $this;
    }

}
