<?php

//LLM Databases

/*
We support three providers:
- OpenAI
- Ollama
- Groq
*/


//Example
//OpenAI: gpt-3.5-turbo
//https://platform.openai.com/docs/models
//Key = name of the model, e.g., gpt-3.5-turbo. It needs to match the exact model name provided by the LLM provider.
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['Title']								= 'ChatGPT 3.5 Turbo';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['API_URL']								= 'https://api.openai.com/v1/chat/completions';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['Headers'][]							= 'Content-Type: application/json';

//Replace Replace_with_your_OpenAI_API_Key with your own API key, e.g.,
//Authorization: Bearer My_OpenAI_API_Key_123_xyz
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['Headers'][]							= 'Authorization: Bearer Replace_with_your_OpenAI_API_Key';

//This function is specific to OpenAI/ChatGPT
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['preparePromptInput']					= 'preparePromptInput_ChatGPT';

//The name of the prompt_instruction functions.
//Please refer to compbioagent/bxaf_setup/default/5-Prompt.php for details.
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['formatPrompt']							= 'formatPrompt_v2';

//This function is specific to OpenAI/ChatGPT
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-3.5-turbo']['processOutput']						= 'processPromptOutput_ChatGPT';




//Example
//OpenAI: chatgpt-4o-latest
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['Title']							= 'ChatGPT 4o Latest';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['API_URL']							= 'https://api.openai.com/v1/chat/completions';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['Headers'][]						= 'Content-Type: application/json';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['Headers'][]						= 'Authorization: Bearer Replace_with_your_OpenAI_API_Key';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['preparePromptInput']				= 'preparePromptInput_ChatGPT';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['formatPrompt']						= 'formatPrompt_v2';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['chatgpt-4o-latest']['processOutput']					= 'processPromptOutput_ChatGPT';


//Example
//OpenAI: gpt-4o-mini
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['Title']									= 'ChatGPT-4o mini';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['API_URL']								= 'https://api.openai.com/v1/chat/completions';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['Headers'][]								= 'Content-Type: application/json';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['Headers'][]								= 'Authorization: Bearer Replace_with_your_OpenAI_API_Key';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['preparePromptInput']						= 'preparePromptInput_ChatGPT';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['formatPrompt']							= 'formatPrompt_v2';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gpt-4o-mini']['processOutput']							= 'processPromptOutput_ChatGPT';



//Example
//Ollama: Llama3:instruct
//https://ollama.com/library/llama3:instruct
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama3:instruct']['Title']								= 'Llama 3 (instruct)';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama3:instruct']['API_URL']							= 'http://localhost:11434/api/generate';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama3:instruct']['Headers'][]							= 'Content-Type: application/json';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama3:instruct']['preparePromptInput']					= 'preparePromptInput_Ollama';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama3:instruct']['formatPrompt']						= 'formatPrompt_v2';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama3:instruct']['processOutput']						= 'processPromptOutput_Ollama';


//Example
//Ollama: Google gemma:7b
//https://ollama.com/library/gemma:7b
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gemma:7b']['Title']										= 'Gemma:7b';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gemma:7b']['API_URL']									= 'http://localhost:11434/api/generate';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gemma:7b']['Headers'][]									= 'Content-Type: application/json';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gemma:7b']['preparePromptInput']						= 'preparePromptInput_Ollama';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gemma:7b']['formatPrompt']								= 'formatPrompt_v1';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['gemma:7b']['processOutput']								= 'processPromptOutput_Ollama';


//Example
//Groq: llama-3.3-70b-versatile
//https://console.groq.com/docs/models
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['Title']						= 'Llama 3.3-70b-versatile';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['API_URL']					= 'https://api.groq.com/openai/v1/chat/completions';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['Headers'][]					= 'Authorization: Bearer Replace_with_your_Groq_API_KEY';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['Headers'][]					= 'Content-Type: application/json';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['preparePromptInput']			= 'preparePromptInput_Groq';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['formatPrompt']				= 'formatPrompt_v1';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['llama-3.3-70b-versatile']['processOutput']				= 'processPromptOutput_Groq';


//Example
//Groq: deepseek-r1-distill-llama-70b
//https://console.groq.com/docs/models
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['Title']				= 'DeepSeek-R1-Distill-Llama-70b';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['API_URL']				= 'https://api.groq.com/openai/v1/chat/completions';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['Headers'][]			= 'Authorization: Bearer Replace_with_your_Groq_API_KEY';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['Headers'][]			= 'Content-Type: application/json';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['preparePromptInput']	= 'preparePromptInput_Groq';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['formatPrompt']			= 'formatPrompt_v1';
$BXAF_CONFIG_CUSTOM['SETTINGS']['LLM']['deepseek-r1-distill-llama-70b']['processOutput']		= 'processPromptOutput_Groq';

?>