#Getsquare_AdminPayments (Alvie)
A Magento extension which allows compatible Payment Methods to be enabled for the Admin (backend) only.

##Description

The default behaviour for Magento is that when a Payment Method is enabled it appears in both the frontend and the backend. This extension allows you to select which Payment Methods appear in the Admin (backend) only. Payment Methods can be selected if they have the appropriate canUseInternal() flag.

##Installation

If you make use of modman use the "modman clone" command from the root of your Magento instance to install. If you don't use modman download the zip or clone repository and merge (excluding the modman file) with your Magento instance.

## Settings
Please see System > Configuration > Getsquare - Admin Payments

### Notes
For current versions of Magento Google Checkout still features as a method within the codebase although it is not an active gateway, as this method does not have an associated label this displays in empty line in the multi-select within the settings. 