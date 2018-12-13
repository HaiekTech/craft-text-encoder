# Craft Text Encoder plugin for Craft CMS 3.x

Encode strings, email addresses or whatever you want...

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require haiek/craft-text-encoder

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Craft Text Encoder.

## Usage

You can use the plugin either as a function or a filter:

```twig
{# encode all emails found inside string #}
{{ findEncodeMail(block.richTextEditor)|raw }}

{# encode a single email address #}
{{ encodeMail('hello@haiek.tech')|raw }}
```

```twig
{# encode all emails found inside string #}
{{ block.richTextEditor|findEncodeMail|raw }}

{# encode a single email address #}
{{ 'hello@haiek.tech'|encodeMail|raw }}
```