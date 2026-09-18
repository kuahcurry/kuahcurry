<section id="work-together" class="py-20 md:py-28 bg-[#F4F2EB] border-b border-[#E8E5DC]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Classical Invitation Banner -->
        <div class="text-center space-y-4 mb-14">
            <div class="inline-flex items-center gap-2 text-[#8F6A3B] text-xs font-mono tracking-widest uppercase font-semibold">
                <span>06</span>
                <span class="w-8 h-px bg-[#8F6A3B]"></span>
                <span>Initiate Collaboration</span>
            </div>
            
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#1C1917]">
                Let’s Build Something Enduring Together
            </h2>
            
            <p class="text-base sm:text-lg text-[#57534E] max-w-2xl mx-auto leading-relaxed">
                Whether you are launching a greenfield SaaS product, scaling high-throughput Laravel systems, or seeking disciplined software architecture advisory — I invite you to share your vision below.
            </p>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 md:p-12 shadow-md">
            
            <!-- Dynamic Alert for Flash or AJAX feedback -->
            <div id="form-feedback-alert" class="{{ session('success') ? '' : 'hidden' }} mb-8 p-4 rounded-xl border {{ session('success') ? 'bg-emerald-50 text-emerald-900 border-emerald-200' : '' }} text-sm leading-relaxed">
                @if(session('success'))
                    {{ session('success') }}
                @endif
            </div>

            @if($errors->any())
                <div class="mb-8 p-4 rounded-xl border bg-rose-50 text-rose-900 border-rose-200 text-sm space-y-1">
                    <p class="font-semibold">Please correct the following errors:</p>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="work-together-form" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Row 1: Name & Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <md-outlined-text-field
                            label="Your Name *"
                            id="contact-name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            style="width: 100%;"
                        >
                            <span slot="leading-icon" class="material-symbols-outlined">person</span>
                        </md-outlined-text-field>
                    </div>

                    <div>
                        <md-outlined-text-field
                            label="Your Email *"
                            type="email"
                            id="contact-email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            style="width: 100%;"
                        >
                            <span slot="leading-icon" class="material-symbols-outlined">mail</span>
                        </md-outlined-text-field>
                    </div>
                </div>

                <!-- Row 2: Subject -->
                <div>
                    <md-outlined-text-field
                        label="Project Title or Scope *"
                        id="contact-subject"
                        name="subject"
                        value="{{ old('subject') }}"
                        required
                        style="width: 100%;"
                    >
                        <span slot="leading-icon" class="material-symbols-outlined">label</span>
                    </md-outlined-text-field>
                </div>

                <!-- Row 3: Engagement Type & Timeline -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="contact-project-type" class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-2 font-semibold">
                            Engagement Type
                        </label>
                        <select 
                            id="contact-project-type" 
                            name="project_type" 
                            class="w-full px-4 py-3 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-[#1C1917] text-sm focus:border-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none transition"
                        >
                            <option value="Full-Stack Web Development">Full-Stack Web Development</option>
                            <option value="Laravel Backend & Architecture">Laravel Backend & Architecture</option>
                            <option value="System Scalability & Performance Audit">System Scalability & Performance Audit</option>
                            <option value="Technical Advisory / Fractional Leadership">Technical Advisory / Fractional Leadership</option>
                            <option value="Full-time Senior Engineering Role">Full-time Senior Engineering Role</option>
                            <option value="Other Collaboration">Other Collaboration</option>
                        </select>
                    </div>

                    <div>
                        <label for="contact-budget" class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-2 font-semibold">
                            Estimated Budget / Scope
                        </label>
                        <select 
                            id="contact-budget" 
                            name="budget" 
                            class="w-full px-4 py-3 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-[#1C1917] text-sm focus:border-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none transition"
                        >
                            <option value="Flexible / To be discussed">Flexible / To be discussed</option>
                            <option value="<$5k (Fixed consultation / Small project)">&lt; $5k (Consultation / Small scope)</option>
                            <option value="$5k - $15k (Medium product build)">$5k - $15k (Medium product build)</option>
                            <option value="$15k - $40k+ (Enterprise architecture)">$15k - $40k+ (Enterprise architecture)</option>
                            <option value="Full-time Compensation Package">Full-time Compensation Package</option>
                        </select>
                    </div>
                </div>

                <!-- Row 4: Project Overview / Message -->
                <div>
                    <md-outlined-text-field
                        type="textarea"
                        label="Project Overview & Requirements *"
                        id="contact-message"
                        name="message"
                        rows="5"
                        required
                        style="width: 100%;"
                        supporting-text="Provide a summary of goals, timelines, and relevant technical context."
                    >
                        <span slot="leading-icon" class="material-symbols-outlined">edit_note</span>
                    </md-outlined-text-field>
                </div>

                <!-- Submit Action using Material Web Button -->
                <div class="pt-6 mt-4 border-t border-[#F4F2EB] flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <p class="text-xs text-[#78716C] font-mono">
                        Direct transmission &bull; Stored securely in database
                    </p>

                    <div class="my-1 sm:my-0">
                        <button type="submit" class="contents">
                            <md-filled-button 
                                id="submit-inquiry-btn"
                                style="--md-filled-button-container-color: #1C1917; --md-filled-button-label-text-color: #FAF9F6; height: 48px; padding-left: 28px; padding-right: 28px; font-size: 0.95rem; margin: 4px 0;"
                            >
                                <span slot="icon" class="material-symbols-outlined">send</span>
                                Transmit Project Inquiry
                            </md-filled-button>
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</section>
