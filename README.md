# YouTube Agents with Neuron AI PHP framework

> Read the full article: https://inspector.dev/php-ai-agent-summarizing-youtube-videos/

![](youtube-php-ai-agent.png)

This repository contains the PHP implementation of an AI Agents summarizing YouTube videos.
It is built using the [Neuron AI](https://github.com/inspector-apm/neuron-ai) package.

# YouTube Agent Use Cases
Let's explore three real-world contexts where YouTube video summarization can be incredibly helpful.

## Educational Context
Students, teachers, and researchers often need to extract key information from lengthy educational content. The YouTube Agent could help:

- Students can quickly determine if a 2-hour lecture contains the specific topic they're researching.
- Teachers can preview educational content before assigning it to students, ensuring relevance and quality.
- Researchers can efficiently process multiple conference presentations without watching them in full.

## Content Creation and Media Monitoring
Creators and media professionals can use this Agent to:

- Journalists can quickly analyze trending video discussions without full viewing.
- Content creators can automate description generation for their contents.
- Social media managers can automate posts generation from YouTube videos ensuring more relevant content creation.

Just give you some inspiration. You can eventually share your implementation of the Neuron AI forum: 
https://github.com/inspector-apm/neuron-ai/discussions

# NeuronAI PHP framework
Neuron is an agentic framework that allows you to create full-featured AI Agents in PHP. 
It definitively fills the gap for AI Agents development between PHP and other ecosystems like Python or Javascript.

It provides you with a standard toolkit to implement AI-driven applications drastically reducing vendor lock-in. 
You can switch between LLMs, vector stores, embedding providers, etc. with just a few lines of code without the 
need to refactor big portions of your application.

If you are new to AI Agents development, or you already have experience, Neuron can be the perfect playground 
to move your idea from experiments to reliable production implementations.

Checkout the documentation: https://docs.neuron-ai.dev

# How to use this project

Download the project on your machine and open your terminal into the project directory.
First, install the composer dependencies:

```
composer install
```

Rename the `.env.example` into `.env` and provide the script with the Anthropic API key, Supadata API key, 
and the [Inspector](https://inspector.dev) ingestion key if you want to monitor the agent execution:

```dotenv
ANTHROPIC_API_KEY=
SUPADATA_API_KEY=
INSPECTOR_INGESTION_KEY=
```

To interact with the agent, you can just run the `youtube.php` script:

```
php .\public\youtube.php
```

# Agent Monitoring
The Inspector team designed Neuron AI with built-in observability integration backed by [Inspector.dev](https://inspector.dev/), 
so you can monitor AI agents were running for error detection and performance analysis. 
Inspector helps you move your agents from prototype to production with confidence.

To enable the Agent monitoring, you need to provide the Inspector ingestion key in the `.env` file. 
You get a new key registering an account on the [Inspector](https://inspector.dev/) website.

```dotenv
INSPECTOR_INGESTION_KEY=m849w7g8xxxxxxxxxxxxxxxxxxxxxxxxxxx
```

Now, when you run the agent you will be able to explore its internal execution flow in the Inspector dashboard, 
and be alerted for unpredictable errors via email.

![](https://inspector.dev/wp-content/uploads/2025/05/neuron-reranker-observability-1536x766.png)

## Inspector.dev
[Inspector](https://supadata.ai) is a code execution monitoring tool for the PHP ecosystem.

It provides full visibility into the AI Agent execution flow. Learn more on the Neuron documentation:
https://docs.neuron-ai.dev/advanced/observability

## Supadata.ai
[Supadata](https://supadata.ai) is built on purpose to help you build better AI products faster.

They provide 100 monthly API requests for free, and you can also retrieve the video transcriptions in many languages.

## E-Book
Start With AI Agents In PHP:

- [Amazon](https://www.amazon.com/dp/B0F1YX8KJB)
- [Google Play](https://play.google.com/store/books/details?pcampaignid=books_read_action&id=agJPEQAAQBAJ&pli=1)